<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\Advertiser;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InvoiceController extends Controller
{
    private static $page_title_section = 'Facturen';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::latest()->paginate(12);

        return view('pages.invoices.index', compact('invoices'))->with([
            'pageTitleSection' => self::$page_title_section,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($order_id)
    {
        $order = Order::findOrFail($order_id);

        return view('pages.invoices.create', compact('order'))->with([
            'pageTitleSection' => self::$page_title_section,
            'subpagesData' => $this->getSubpages(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('invoices.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $invoice_id)
    {
        $invoice = Invoice::FindOrFail($invoice_id);

        return view('pages.invoices.edit', compact('invoice'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'subpagesData' => $this->getSubpages(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $invoice_id)
    {
        try {
            DB::transaction(function () use($request, $invoice_id) {
                Invoice::where('id', $invoice_id)->update([
                    'name' => $request->input('name')
                ]);
            });

            Alert::toast('Factuur is successvol aangemaakt', 'success');
            return redirect()->route('invoices.index');

        } catch (\Exception $e) {
            Alert::toast('Er is iets mis gegaan', 'error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $invoice_id)
    {
        $invoice = Invoice::find($invoice_id);

        if( $invoice ) {
            $invoice->delete();

            Alert::toast('De factuur is verwijderd.', 'info');
        }

        return redirect()->route('invoices.index');
    }
}
