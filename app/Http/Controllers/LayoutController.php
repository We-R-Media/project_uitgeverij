<?php

namespace App\Http\Controllers;

use App\Models\Layout;
use Illuminate\Http\Request;
use App\Http\Requests\LayoutRequest;
use Illuminate\Support\Facades\DB;

class LayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $layouts = Layout::all();

        return view('pages.settings.layouts', compact('layouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(LayoutRequest $request)
    {

        DB::transaction(function () use($request) {

            $file = $request->file('logo');
            $originalName = $file->getClientOriginalName();

            $file->move(public_path('images'), $originalName);

            Layout::create([
                'layout_name' => $request->input('layout_name'),
                'city_name' => $request->input('city_name'),
                'logo' => $originalName,
            ]);
        });
        return redirect()->route('layouts.page');
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
    public function show(Layout $layout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Layout $layout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Layout $layout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layout $layout)
    {
        //
    }
}
