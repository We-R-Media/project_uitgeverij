<?php

namespace App\Http\Controllers;

use App\Models\Layout;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    private static $page_title_section = 'Layouts';

    public function __construct()
    {
        $this->subpages = [
            'Formaten' => 'formats.index',
            'Verkopers' => 'sellers.index',
            'Layouts' => 'layouts.index',
            'BTW' => 'tax.index',
            'Aanmaningen' => 'reminders.index',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layouts = Layout::paginate(10);

        $subpages = $this->getSubpages() ?? false;

        return view('pages.layouts.index', compact('layouts'))->with([
            'pageTitleSection' => self::$page_title_section,
            'subpages' => $subpages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subpages = $this->getSubpages() ?? false;

        return view('pages.layouts.create')
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'subpages' => $subpages
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::transaction(function () use($request) {
            Layout::create([
                'layout_name' => $request->input('layout_name'),
                'city_name' => $request->input('city_name'),
                'logo' => $request->input('logo'),
            ]);
        });
        return redirect()->back();
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
    public function edit(Layout $layout, string $id)
    {
        $layout = Layout::findOrFail($id);
        $subpages = $this->getSubpages() ?? false;

        return view('pages.layouts.edit', compact('layout'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'pageTitle' => $layout->title,
                'subpages' => $subpages
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Layout $layout, $id)
    {
        DB::transaction(function () use($request, $id, $layout) {
            Layout::where('id', $id)->update([
                'layout_name' => $request->input('layout_name'),
                'city_name' => $request->input('city_name'),
                'logo' => $request->input('logo')
            ]);
        });

        return redirect()->route('layouts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layout $layout)
    {
        //
    }
}
