<?php

namespace App\Http\Controllers;

use App\Models\VAT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VATController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.settings.vat');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $btw = DB::transaction(function () use($request) {
            VAT::create([
                'btw_country' => $request->input('country_code'),
                'btw_zero' => $request->input('percentage_zero'),
                'btw_low' => $request->input('percentage_low'),
                'btw_high' => $request->input('percentage_high'),

            ]);
        });
        return redirect()->route('vat.page');
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
    public function show(VAT $VAT)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VAT $VAT,)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VAT $VAT)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VAT $VAT)
    {
        //
    }
}
