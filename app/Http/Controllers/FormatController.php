<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormatRequest;
use App\Models\Format;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class FormatController extends Controller
{
    private static $page_title_section = 'Formaten';
    private static $confirm_delete_title = 'Formaat verwijderen.';
    private static $confirm_delete_text = "Weet je zeker dat je dit formaat wil verwijderen?";

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
        $formats = Format::paginate(10);

        confirmDelete(self::$confirm_delete_title, self::$confirm_delete_text);

        return view('pages.formats.index', compact('formats'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
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
        try {
            DB::transaction(function () use($request) {
                Format::create([
                    'size' => $request->input('size'),
                    'measurement' => $request->input('measurement'),
                    'ratio' => $request->input('ratio'),
                    'price' => $request->input('price'),
                ]);
            });

            Alert::toast('Het formaat is succesvol aangemaakt', 'success');

            return redirect()->route('formats.index');
        } catch (\Exception $e){
            Alert::toast('Er is iets fout gegaan', 'error');

            return redirect()->route('formats.index');
        }
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
        try {
            DB::transaction(function () use($request,$id) {
                Format::where('id', $id)->update([
                    'size' => $request->input('size'),
                    'measurement' => $request->input('measurement'),
                    'ratio' => $request->input('ratio'),
                    'price' => $request->input('price'),
                ]);
            });

            Alert::toast('Het formaat is aangepast.', 'success');

            return redirect()->route('formats.index');
        } catch (\Exception $e){
            Alert::toast('Er is iets fout gegaaan.', 'error');

            return redirect()->route('formats.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $format = Format::find($id);

        if($format) {
            $format->delete();

            Alert::toast('Het formaat is verwijderd.', 'info');
        }

        return redirect()->route('formats.index');
    }
}
