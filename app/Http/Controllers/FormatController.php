<?php

namespace App\Http\Controllers;

use App\Models\Format;
use App\Models\FormatGroup;
use Illuminate\Http\Request;
use App\Http\Requests\FormatRequest;
use Illuminate\Support\Facades\DB;

class FormatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     return view('pages.settings.formats');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create(FormatRequest $request)
    {

        DB::transaction(function () use($request) {
            Format::create([
                'size' => $request->input('size'),
                'measurement' => $request->input('measurement'),
                'ratio' => $request->input('ratio'),
                'price' => $request->input('price'),
            ]);
        });

        return redirect()->route('formats.index');
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
    public function show(Format $format)
    {
        $formats = Format::all();

        return view('pages.settings.formats', compact('formats'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Format $format)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Format $format)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Format $format)
    {
        //
    }
}
