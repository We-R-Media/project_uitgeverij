<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    private static $page_title_section = 'Verkopers';

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

        $sellers = User::where('role', 'seller')->get();

        return view('pages.sellers.index', compact('sellers', 'subpages'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $seller, $id)
    {
        $seller = User::findOrFail($id);
        $subpages = $this->getSubpages() ?? false;

        return view('pages.sellers.edit', compact('seller'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'pageTitle' => $seller->title,
                'subpages' => $subpages
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $seller, $id)
    {
        DB::transaction(function () use($request, $id, $seller) {
            User::where('id', $id)->update([
                'first_name' => $request->input('first_name'),
                'initial' => $request->input('initial'),
                'last_name' => $request->input('last_name'),
            ]);
        });

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $seller)
    {
        //
    }
}
