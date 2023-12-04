<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Project;
use App\Models\Format;
use App\Models\OrderLine;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class OrderLineController extends Controller
{
    private static $page_title_section = 'Orderregels';

    public function __construct()
    {
        $this->subpages = [
            'Ordergegevens' => 'orders.edit',
            'Print' => 'orders.print',
            'Klachten' => 'orders.complaints',
            'Orderregels' => 'orderlines.index',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(string $order_id)
    {
        $order = Order::with('orderLines')->findOrFail($order_id);

        $orderlines = $order->orderLines()->withTrashed()->paginate(12);

        // $trashed = $orderlines->trashed();


        return view('pages.orderlines.index', compact('order', 'orderlines'))->with([
            'pageTitleSection' => self::$page_title_section,
            'subpagesData' => $this->getSubpages($order_id),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $order_id)
    {
        $order = Order::findOrFail($order_id);

        $projects = Project::all();
        // $project = Project::findOrFail($project_id);

        return view('pages.orderlines.create', compact('order', 'projects'))->with([
            'pageTitleSection' => self::$page_title_section,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $order_id)
    {
        try 
        {
            DB::transaction(function () use ($request, $order_id) {
                $order = Order::findOrFail($order_id);

                $project = Project::findOrFail($request->input('project_id'));

                $format = Format::findOrFail($request->input('format_id'));
                $raw_price = $request->input('base_price');
                $cleaned_price = str_replace(',', '.', preg_replace('/[^\d,]/', '', $raw_price));
                $base_price = floatval($cleaned_price);                
                $discount = $request->input('discount');
                $discount_amount = $base_price - $discount;

                $orderline = OrderLine::create([
                    'base_price' => $base_price,
                    'discount' => $discount,
                    'project_id' => $project,
                    'price_with_discount' => ($discount != 0) ? ($base_price - $discount) : $base_price,
                ]);

                $orderline->order()->associate($order);
                $orderline->save();

                $orderline->project()->associate($project);
                $orderline->save();

                $orderline->format()->associate($format);
                $orderline->save();

                $order->updateOrderTotalPrice();
            });

            Alert::toast('De orderregel is succesvol aangemaakt', 'success');
            return redirect()->route('orderlines.index', $order_id);

        } catch(Exception $e) {
            Alert::toast('Er is iets fout gegaan', 'error');
            return redirect()->route('orderlines.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $orderline_id  The ID of the order line to be deleted.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $order_id, string $regel_id)
    {
        $orderline = OrderLine::findOrFail($regel_id);

        try {
            if ($orderline) {
                $orderline->delete();

                $orderline->order->updateOrderTotalPrice();

                Log::info('Orderregel succesvol verwijderd: ' . $orderline->order->id);
                Alert::toast('Orderregel succesvol verwijderd', 'success');
            }

        } catch (ModelNotFoundException $e) {
            Log::error('Orderregel niet gevonden: ' . $regel_id);
            Alert::toast('Orderregel niet gevonden', 'error');

        } catch (QueryException $e) {
            Log::error('Databasefout bij verwijderen orderregel: ' . $e->getMessage());
            Alert::toast('Er is een fout opgetreden bij het verwijderen van de orderregel', 'error');
        }

        return redirect()->route('orderlines.index', $order_id);
    }

    /**
     * Restore a trashed order line.
     *
     * @param  int  $orderline_id  The ID of the trashed order line to restore.
     * @return void
     */
    public function restore(string $order_id, string $regel_id)
    {
        try {
            $orderline = OrderLine::onlyTrashed()->findOrFail($regel_id);

            $orderline->restore();
            $orderline->order->updateOrderTotalPrice();

            Log::info('Orderregel succesvol hersteld: ' . $orderline->order->id);
            Alert::toast('Orderregel succesvol hersteld', 'success');
        } catch (ModelNotFoundException $e) {

            Log::error('Orderregel niet gevonden: ' . $regel_id);
            Alert::toast('Orderregel niet gevonden', 'error');
            
        } catch (QueryException $e) {

            Log::error('Databasefout bij herstellen orderregel: ' . $e->getMessage());
            Alert::toast('Er is een fout opgetreden bij het herstellen van de orderregel', 'error');

        }

        return redirect()->route('orderlines.index', $order_id);
    }
}
