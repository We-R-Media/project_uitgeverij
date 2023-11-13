<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Advertiser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\SampleEmail;

class OrderController extends Controller
{
    private static $page_title_section = 'Orders';

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
    public function index()
    {
        // $orders = Order::with(['advertiser', 'project'])->paginate(10);
        $orders = Order::paginate(10);

        return view('pages.orders.index', compact('orders'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $subpages = $this->getSubpages() ?? false;
        $advertiser = Advertiser::findOrFail($id);
        $order = Order::findOrFail($id);

        return view('pages.orders.create', compact('advertiser','order'))
        ->with([
            'pageTitleSection' => self::$page_title_section,
            'subpages' => $subpages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,  $id)
    {
        DB::transaction(function () use($request, $id) {

            $advertiser = Advertiser::findOrFail($id);
            $order = Order::create([
                'order_date' => now(),
                'approved_at' => now(),
                'order_total_price' => 0.00,
            ]);

            $order->advertiser()->associate($advertiser);
            $order->save();
        });
        return redirect()->route('orders.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::findOrFail($id);
        $subpages = $this->getSubpages() ?? false;

        return view('pages.orders.edit', compact('order'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'pageTitle' => $order->title,
                'subpages' => $subpages,
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

        return redirect()->route('orders.index');
    }

    public function approved(Request $request, $id) {

        dd(true);

        DB::transaction(function () use ($request, $id) {
            Order::where('id', $id)->update([
                'approved_at' => $request->dateTimeNow(),
            ]);
        });
        return redirect()->route('orders.index');
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

        return redirect()->route('orders.index');
    }

    public function print(string $id)
    {
        $order = Order::findOrFail($id);
        $subpages = $this->getSubpages( $id ) ?? false;

        return view('pages.orders.print')->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $order->title,
            'subpages' => $subpages
        ]);
    }

    public function articles(string $id)
    {
        $order = Order::findOrFail($id);
        $subpages = $this->getSubpages( $id ) ?? false;

        return view('pages.orders.articles')->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $order->title,
            'subpages' => $subpages
        ]);
    }

    public function complaints(string $id)
    {
        $order = Order::findOrFail($id);
        $subpages = $this->getSubpages( $id ) ?? false;

        return view('pages.orders.complaints')->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $order->title,
            'subpages' => $subpages
        ]);
    }
}
