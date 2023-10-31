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
        $subpages = $this->getSubpages() ?? false;

        return view('pages.orders', compact('subpages'))
            ->with([
                'pageTitle' => self::$page_title_singular,
                'pageTitleSection' => self::$page_title_plural,
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
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
