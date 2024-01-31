<?php

namespace App\Http\Controllers;

use App\Http\Requests\LayoutRequest;
use App\Models\Layout;
use App\Traits\ImageHandling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class LayoutController extends Controller
{
    use ImageHandling;

    private static $page_title_section = 'Layouts';

    public function __construct()
    {
        $this->subpages = [
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
        $layouts = Layout::latest()->paginate(15);

        return view('pages.layouts.index', compact('layouts'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'subpagesData' => $this->getSubpages(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.layouts.create')
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'subpagesData' => $this->getSubpages(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LayoutRequest $request)
    {
        $validatedData = $request->validated();
        $imagePath = $this->processImage($request);

        DB::transaction(function () use ($validatedData, $imagePath) {
            Layout::create([
                'layout_name' => $validatedData['layout_name'],
                'city_name' => $validatedData['city_name'],
                'logo' => $imagePath,
            ]);
        });

        Alert::toast('De layout is aangemaakt.', 'success');

        return redirect()->route('layouts.index');
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
    public function edit(Layout $layout, string $layout_id)
    {
        $layout = Layout::findOrFail($layout_id);

        return view('pages.layouts.edit', compact('layout'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'pageTitle' => $layout->title,
                'subpagesData' => $this->getSubpages(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LayoutRequest $request, string $layout_id)
    {
        $layout = Layout::findOrFail($layout_id);
        $validatedData = $request->validated();

        DB::transaction(function () use ($layout, $validatedData, $request) {
            $this->updateImage($layout, $request);

            $layout->update([
                'layout_name' => $validatedData['layout_name'],
                'city_name' => $validatedData['city_name']
            ]);
        });

        Alert::toast('De layout is bijgewerkt.', 'success');

        return redirect()->route('layouts.edit', $layout_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $layout = Layout::find($id);

        if( $layout ) {
            $layout->delete();

            Alert::toast('De layout is verwijderd.', 'info');
        }

        return redirect()->route('layouts.index');
    }
}
