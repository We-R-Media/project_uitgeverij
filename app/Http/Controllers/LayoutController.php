<?php

namespace App\Http\Controllers;

use App\Models\Layout;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use RealRashid\SweetAlert\Facades\Alert;

class LayoutController extends Controller
{
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
        $layouts = Layout::latest()->paginate(12);

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
    public function store(Request $request)
    {
        DB::transaction(function () use($request) {
            Layout::create([
                'layout_name' => $request->input('layout_name'),
                'city_name' => $request->input('city_name'),
                'logo' => $request->input('logo'),
            ]);
        });
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
    public function update(Request $request, $layout_id)
    {
        DB::transaction(function () use($request, $layout_id) {
            Layout::where('id', $layout_id)->update([
                'layout_name' => $request->input('layout_name'),
                'city_name' => $request->input('city_name'),
                'logo' => $request->input('logo')
            ]);
        });

        return redirect()->route('layouts.index');
    }

     /**
     * Upload the logo in the public folder
     */
    public function upload(Request $request ) :  JsonResponse
    {
        $image = $request->file('file');

        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images/uploads'),$imageName);

        return response()->json(['success'=> 'images/uploads/'.$imageName]);
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
