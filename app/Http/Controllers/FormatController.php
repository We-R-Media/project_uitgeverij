<?php

namespace App\Http\Controllers;

use App\Models\Format;
use Illuminate\Http\Request;
use Illuminate\Http\Requests\FormatRequest;
use Illuminate\Support\Facades\DB;

class FormatController extends Controller

{
    private static $page_title_section = 'Formaten';


    public function __construct()
    {
        $this->subpages = [
            'Formaten' => 'formats.index',
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
        $subpages = $this->getSubpages() ?? false;

        $formats = Format::paginate(10);

        return view('pages.formats.index', compact('formats'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
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
            'pageTitleSection' => self::$page_title_section,
            'subpages' => $subpages,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormatRequest $request)
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
        $format = Format::findOrFail($id);
        $subpages = $this->getSubpages() ?? false;

        return view('pages.formats.edit', compact('format'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'pageTitle' => $format->title,
                'subpages' => $subpages,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormatRequest $request, string $id)
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
