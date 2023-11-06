<?php

namespace App\Http\Controllers;

use App\Models\Layout;
use Illuminate\Http\Request;
use App\Http\Requests\LayoutRequest;
use Illuminate\Support\Facades\DB;

class LayoutController extends Controller
{
    private static $page_title_singular = 'Layout';
    private static $page_title_plural = 'Layouts';

    public function __construct()
    {
        $this->subpages = [
            'Formaten' => 'formats.index',
            'Verkopers' => 'sellers.index',
            'Layouts' => 'layouts.index',
            'BTW' => 'settings.tax',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subpages = $this->getSubpages() ?? false;

        return view('pages.settings.layouts', compact('subpages'))
        ->with([
            'pageTitleSection' => self::$page_title_plural,
            'pageTitle' => self::$page_title_singular,
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
        return redirect()->route('layouts.index');
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
