<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Format;
use App\Models\Project;
use App\Models\OrderLine;

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
        $order = Order::findOrFail($order_id);

        return view('pages.orderlines.index', compact('order'))->with([
            'pageTitleSection' => self::$page_title_section,
            'subpagesData' => $this->getSubpages($order_id),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $order_id, string $project_id)
    {
        $order = Order::findOrFail($order_id);
        $project = Project::findOrFail($project_id);
    
        // $paperTypes = explode(',', $project->paper_format);
    
        // $paperTypes = array_map('trim', $paperTypes);
    
        // $formats = Format::whereIn('paper_type', $project)->get();

        return view('pages.orderlines.create', compact('order', 'project'))->with([
            'pageTitleSection' => self::$page_title_section,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $order_id)
    {


         DB::transaction(function () use($request, $order_id) {

            $order = Order::findOrFail($order_id);

            $orderline = OrderLine::create([
                'base_price' => $request->input('base_price'),
                'discount' => $request->input('discount'),
            ]);

            // $order->orderlines()->save($orderline);
            $orderline->order()->associate($order);
        });
        return redirect()->route('orderlines.index', $order_id);
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
