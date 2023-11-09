<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
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

            Alert::success('Het formaat is succesvol aangemaakt');

            return redirect()->route('formats.index');
        } catch (\Exception $e){
            Alert::error('Er is iets fout gegaan');

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
    public function update(Request $request, string $id)
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

            Alert::success('Het formaat is aangepast.');

            return redirect()->route('formats.index');
        } catch (\Exception $e){
            Alert::error('Er is iets fout gegaaan.');

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

            Alert::info('Het formaat is verwijderd.');
        }

        return redirect()->route('formats.index');
    }
}
