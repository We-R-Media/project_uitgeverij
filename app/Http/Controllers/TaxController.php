<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TaxRequest;
use App\Models\Tax;
use RealRashid\SweetAlert\Facades\Alert;

class TaxController extends Controller
{
    private static $page_title_section = 'BTW';

    public function __construct() {
        $this->subpages = [
            'Layouts' => 'layouts.index',
            'BTW' => 'tax.index',
            'Aanmaningen' => 'reminders.index',
            'Gebruikers' => 'users.index',
        ];
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taxes = Tax::all();

        $subpages = $this->getSubpages() ?? false;

        return view('pages.tax.index', compact('taxes'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'subpagesData' => $this->getSubpages(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $subpages = $this->getSubpages() ?? false;

        return view('pages.tax.create')
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'subpages' => $subpages,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaxRequest $request)
    {
        DB::transaction(function () use($request) {
            Tax::create([
                'country' => $request->input('country'),
                'zero' => $request->input('zero'),
                'low' => $request->input('low'),
                'high' => $request->input('high'),
            ]);
        });
        return redirect()->route('tax.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $tax_id)
    {
        $tax = Tax::findOrFail($tax_id);

        $subpages = $this->getSubpages() ?? false;

        return view('pages.tax.edit', compact('tax'))
        ->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $tax->title,
            'subpages' => $subpages
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaxRequest $request, string $tax_id)
    {
        DB::transaction(function () use($request, $tax_id) {
            Tax::where('id', $id)->update([
                'country' => $request->input('country'),
                'zero' => $request->input('zero'),
                'low' => $request->input('low'),
                'high' => $request->input('high'),
            ]);
        });
        return redirect()->route('tax.index');
    }

    /**
     * Remove the specified resource from storage.
     */
      /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $tax_id)
    {
        $tax = Tax::findOrFail($tax_id);

        if( $tax ) {
            $tax->delete();

            Alert::toast('Het project is verwijderd.', 'info');
        }

        return redirect()->route('tax.index');
    }
}
