<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Advertiser;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $orders = Order::latest()->whereNull( 'deactivated_at' )->paginate(10);

        $this->subpages = [
            'Actueel' => 'orders.index',
            'Gedeactiveerd' => 'orders.deactivated',
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
        $orders = Order::whereNotNull('deactivated_at')->paginate(10);

        $this->subpages = [
            'Actueel' => 'orders.index',
            'Gedeactiveerd' => 'orders.deactivated',
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
        DB::transaction(function () use($request, $advertiser_id) {
            $project_id = $request->input('project_id');

            $order = Order::create([
                'project_id' => $project_id,
                'order_date' => now(),
                'approved_at' => now(),
                'order_total_price' => 0.0,
            ]);


            $project = Project::findOrFail($project_id);
            $order->project()->associate($project);
            $order->save();
            
            $advertiser = Advertiser::findOrFail($advertiser_id);
            $order->advertiser()->associate($advertiser);
            $order->save();
        });


        return redirect()->route('orders.index');
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
                'subpagesData' =>  $this->getSubpages( $order_id )
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $order_id)
    {
        DB::transaction(function () use($request, $order_id) {
            Order::where('id', $order_id)->update([
                
            ]);
        });

        return redirect()->route('orders.index');
    }

    public function approved(Request $request, $id) {

        DB::transaction(function () use ($request, $order_id) {
            Order::where('id', $order_id)->update([
                'approved_at' => $request->dateTimeNow(),
            ]);
        });
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $order_id)
    {
        $order = Order::find($order_id);

        if( $order ) {
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
