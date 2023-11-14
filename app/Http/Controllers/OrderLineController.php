<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
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
    public function index(string $id)
    {
        $subpages = $this->getSubpages() ?? false;
        $order = Order::findOrFail($id);

        return view('pages.orderlines.index', compact('order'))->with([
            'subpages' => $subpages,
            'pageTitleSection' => self::$page_title_section,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $order = Order::findOrFail($id);

        return view('pages.orderlines.create', compact('order'))->with([
            'pageTitleSection' => self::$page_title_section,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        DB::transaction(function () use($id, $request) {
            OrderLine::create([

            ]);
        });
        return redirect()->route('orderlines.index');
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
