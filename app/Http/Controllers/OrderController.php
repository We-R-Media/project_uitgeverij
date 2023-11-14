<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Advertiser;
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
    public function create(string $id)
    {
        $advertiser = Advertiser::findOrFail($id);

        return view('pages.orders.create', compact('advertiser','order'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'subpagesData' => $this->getSubpages(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,  $id)
    {
        $order = DB::transaction(function () use($request, $id) {
            $advertiser = Advertiser::findOrFail($id);
            $order = Order::create([
                'order_date' => now(),
                'approved_at' => now(),
                'order_total_price' => 0.0,
            ]);

            $order->advertiser()->associate($advertiser);
            $order->save();
        });

        dd( $order );

        return redirect()->view('orders.edit', $order->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::findOrFail($id);

        return view('pages.orders.edit', compact('order'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'pageTitle' => $order->title,
                'subpagesData' =>  $this->getSubpages( $id )
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::transaction(function () use($request, $id) {
            Order::where('id', $id)->update([

            ]);
        });

        return redirect()->view('orders.index');
    }

    public function approved(Request $request, $id) {

        dd(true);

        DB::transaction(function () use ($request, $id) {
            Order::where('id', $id)->update([
                'approved_at' => $request->dateTimeNow(),
            ]);
        });
        return redirect()->view('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);

        if( $order ) {
            $order->delete();

            Alert::toast('De order is verwijderd.', 'info');
        }

        return redirect()->view('orders.index');
    }

    public function print(string $id)
    {
        $order = Order::findOrFail($id);

        return view('pages.orders.print')->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $order->title,
            'subpagesData' => $this->getSubpages($id),
        ]);
    }

    public function articles(string $id)
    {
        $order = Order::findOrFail($id);

        return view('pages.orders.articles')->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $order->title,
            'subpagesData' => $this->getSubpages($id),
        ]);
    }

    public function complaints(string $id)
    {
        $order = Order::findOrFail($id);

        return view('pages.orders.complaints')->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $order->title,
            'subpagesData' => $this->getSubpages($id),

        ]);
    }
}
