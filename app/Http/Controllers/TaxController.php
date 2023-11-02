<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;
use App\Http\Requests\TaxRequest;
use Illuminate\Support\Facades\DB;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tax_array = [
            'Nederland',
            'Duitsland'
        ];

        return view('pages.settings.tax', compact('tax_array'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(TaxRequest $request)
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tax $tax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tax $tax)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tax $tax)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tax $tax)
    {
        //
    }
}
