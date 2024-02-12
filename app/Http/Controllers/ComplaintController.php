<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\OrderLine;
use App\Models\Order;
use Carbon\Carbon;
use App\Services\SearchService;


class ComplaintController extends Controller
{
    private static $page_title_section = 'Klachten';

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;


        $this->subpages = [
            'Ordergegevens' => 'orders.edit',
            'Print' => 'orders.print',
            'Klachten' => 'complaints.index',
        ];
    }


    /**
     * Display a listing of the resource.
     */
    public function index(string $order_id)
    {
        // Retrieve complaints with their associated order lines for the specified order ID
        $complaints = Complaint::where('order_id', $order_id)
            ->with('orderline')
            ->latest('created_at')
            ->get();
        return view('pages.complaints.index', compact('complaints'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'subpagesData' => $this->getSubpages( $order_id ),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $order_id, string $orderline_id)
    {
        $orderline = OrderLine::findOrFail($orderline_id);
        $order = Order::findOrFail($order_id);

        $complaint = Complaint::create([
            'complaint_date' => Carbon::now(),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
        ]);

        $complaint->orderline()->associate($orderline);
        $complaint->order()->associate($order);
        $complaint->save();

        return redirect()->route('orders.edit', $order->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
