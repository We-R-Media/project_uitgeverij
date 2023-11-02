<?php

namespace App\Http\Controllers;

use App\Models\Order;
use PDF;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private static $page_title_singular = 'Order';
    private static $page_title_plural = 'Orders';

    public function __construct()
    {
        $this->subpages = [
            'Algemeen' => '/',
            'Print' => '/',
            'Artikel' => '/',
            'Klacht' => '/',
            'Verzoeken onbehandeld' => '/',
            'Verzoeken' => '/',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::paginate(10);
        $subpages = $this->getSubpages() ?? false;

        return view('pages.orders', compact('orders'))
            ->with([
                'pageTitle' => self::$page_title_singular,
                'pageTitleSection' => self::$page_title_plural,
                'subpages' => $subpages
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
    public function store(Request $request)
    {
        //
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
