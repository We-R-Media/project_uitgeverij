<?php

namespace App\Http\Controllers;

use App\Models\BTW;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BtwController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.settings.btw');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $btw = DB::transaction(function () use($request) {
            bTW::create([
                'btw_country' => $request->input('country_code'),
                'btw_zero' => $request->input('percentage_zero'),
                'btw_low' => $request->input('percentage_low'),
                'btw_high' => $request->input('percentage_high'),

            ]);
        });
        return redirect()->route('btw.page');
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
    public function show(BTW $BTW)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BTW $BTW,)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BTW $BTW)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BTW $BTW)
    {
        //
    }
}
