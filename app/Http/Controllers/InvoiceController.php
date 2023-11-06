<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    private static $page_title_singular = 'Factuur';
    private static $page_title_plural = 'Facturen';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::paginate(10);
        $subpages = $this->getSubpages() ?? false;

        return view('pages.invoices', compact('invoices'))->with([
            'pageTitleSection' => self::$page_title_plural,
            'pageTitle' => self::$page_title_singular,
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
    public function destroy(Invoice $invoice)
    {
        //
    }
}
