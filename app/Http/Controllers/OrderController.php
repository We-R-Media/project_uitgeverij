<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Advertiser;
use Carbon\Carbon;
use App\Models\Project;
use App\Models\Contact;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;


class OrderController extends Controller
{
    private static $page_title_section = 'Orders';

    public function __construct()
    {
        $this->subpages = [
            'Ordergegevens' => 'orders.edit',
            'Print' => 'orders.print',
            'Klachten' =>  'orders.complaints',
            'Orderregels' => 'orderlines.index',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::latest()->whereNull('deactivated_at')->paginate(12);

        $this->subpages = [
            'Actueel' => 'orders.index',
            'Geannuleerd' => 'orders.deactivated',
        ];

        return view('pages.orders.index', compact('orders'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'subpagesData' => $this->getSubpages(),
            ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function deactivated()
    {
        $orders = Order::whereNotNull('deactivated_at')->paginate(12);

        $this->subpages = [
            'Actueel' => 'orders.index',
            'Geannuleerd' => 'orders.deactivated',
        ];

        return view('pages.orders.index', compact('orders'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'subpagesData' => $this->getSubpages(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $advertiser_id)
    {
        $advertiser = Advertiser::findOrFail($advertiser_id);
        $projects = Project::all();

        return view('pages.orders.create', compact('advertiser', 'projects'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'subpagesData' => $this->getSubpages($advertiser_id),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,  $advertiser_id)
    {
        try {
            $transactions = DB::transaction(function () use($request, $advertiser_id) {


                $contact_id = $request->input('contact');
                $contact = Contact::findOrFail($contact_id);


                $project_id = $request->input('project_id');
                $project = Project::findOrFail($project_id);


                $advertiser = Advertiser::findOrFail($advertiser_id);

                $token = Str::random(60);



                $order = Order::create([
                    'project_id' => $project_id,
                    'advertiser_id' => $advertiser_id,
                    'contact_id' => $contact_id,
                    'order_date' => now(),
                    'order_total_price' => 0.0,
                    'validation_token' => $token,
                ]);


                $order->project()->associate($project);
                $order->save();

                $order->contact()->associate($contact);
                $order->save();

                $order->advertiser()->associate($advertiser);
                $order->save();
            });

            Alert::toast('De order is successvol aangemaakt', 'success');

            return redirect()->route('advertisers.index');
        } catch (\Exception $e) {
            Alert::toast('Er is iets fout gegaan', 'error');
            dd($e);

            return redirect()->route('advertisers.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $order_id)
    {
        $order = Order::findOrFail($order_id);

        return view('pages.orders.edit', compact('order'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'pageTitle' => $order->title,
                'subpagesData' =>  $this->getSubpages($order_id)
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $order_id)
    {
        try {
            DB::transaction(function () use ($request, $order_id) {

                $order = Order::where('id', $order_id)->update([
                    // 'order_date' => $request->input('order_date'),
                    'approved_at' => $request->input('approved_at') == 1 ? now() : null,
                    'email_sent_at' => $request->input('approved_at') == 1 ? now() : null,
                    'deactivated_at' => $request->input('canceldate') ? now() : null,
                ]);
            });

            Alert::toast('De order is succesvol bijgewerkt', 'success');

            return redirect()->route('orders.index');
        } catch (\Exception $e) {
            dd($e);
            Alert::toast('Er is iets fout gegaan', 'error');

            return redirect()->route('orders.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $order_id)
    {
        $order = Order::find($order_id);

        if ($order) {
            $order->delete();

            Alert::toast('De order is verwijderd.', 'info');
        }

        return redirect()->route('orders.index');
    }

    public function print(string $order_id)
    {
        $order = Order::findOrFail($order_id);

        return view('pages.orders.print')->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $order->title,
            'subpagesData' => $this->getSubpages($order_id),
        ]);
    }

    public function articles(string $order_id)
    {
        $order = Order::findOrFail($order_id);

        return view('pages.orders.articles')->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $order->title,
            'subpagesData' => $this->getSubpages($order_id),
        ]);
    }
    public function complaints(string $order_id)
    {
        $order = Order::findOrFail($order_id);

        return view('pages.orders.complaints')->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $order->title,
            'subpagesData' => $this->getSubpages($order_id),
        ]);
    }
}
