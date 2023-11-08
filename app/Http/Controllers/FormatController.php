<?php

namespace App\Http\Controllers;

use App\Models\Format;
use Illuminate\Http\Request;
use Illuminate\Http\Requests\FormatRequest;
use Illuminate\Support\Facades\DB;

class FormatController extends Controller

{
    private static $page_title_singular = 'Formaat';
    private static $page_title_plural = 'Formaten';


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
        $subpages = $this->getSubpages() ?? false;

        $formats = Format::all();

        return view('pages.formats.index', compact('formats'))
            ->with([
                'pageTitleSection' => self::$page_title_plural,
                'pageTitle' => self::$page_title_singular,
                'subpages' => $subpages,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subpages = $this->getSubpages() ?? false;

        return view('pages.formats.create')
        ->with([
            'pageTitleSection' => self::$page_title_plural,
            'pageTitle' => self::$page_title_singular,
            'subpages' => $subpages,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::transaction(function () use($request) {
            Format::create([
                'size' => $request->input('size'),
                'measurement' => $request->input('measurement'),
                'ratio' => $request->input('ratio'),
                'price' => $request->input('price'),
            ]);
        });

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subpages = $this->getSubpages() ?? false;
        $format = Format::findOrFail($id);

        return view('pages.formats.edit', compact('format'))
            ->with([
                'pageTitleSection' => self::$page_title_plural,
                'pageTitle' => self::$page_title_singular,
                'subpages' => $subpages,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::transaction(function () use($request,$id) {
            Format::where('id', $id)->update([
                'size' => $request->input('size'),
                'measurement' => $request->input('measurement'),
                'ratio' => $request->input('ratio'),
                'price' => $request->input('price'),
            ]);
        });

        return redirect()->route('formats.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
