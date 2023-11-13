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
        $invoices = Invoice::paginate(10);

        return view('pages.invoices.index', compact('invoices'))->with([
            'pageTitleSection' => self::$page_title_section,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $subpages = $this->getSubpages() ?? false;
        $order = Order::findOrFail($id);

        return view('pages.invoices.create', compact('order'))->with([
            'pageTitleSection' => self::$page_title_section,
            'subpages' => $subpages
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
    public function edit(string $id)
    {
        $invoice = Invoice::FindOrFail($id);
        $subpages = $this->getSubpages() ?? false;


        return view('pages.invoices.edit', compact('invoice'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'subpages' => $subpages,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::transaction(function () use($request, $id) {
            Invoice::where('id', $id)->update([
                'name' => $request->input('name')
            ]);
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $invoice = Invoice::find($id);

        if( $invoice ) {
            $invoice->delete();

            Alert::toast('De factuur is verwijderd.', 'info');
        }

        return redirect()->route('orders.index');
    }
}
