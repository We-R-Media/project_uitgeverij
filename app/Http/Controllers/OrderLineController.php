<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index()
    {
        $subpages = $this->getSubpages() ?? false;

        return view('pages.orderlines.index')->with([
            'subpages' => $subpages,
            'pageTitleSection' => self::$page_title_section,
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
