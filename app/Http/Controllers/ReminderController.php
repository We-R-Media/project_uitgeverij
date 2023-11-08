<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReminderController extends Controller
{

    private static $page_title = 'Aanmaning';
    private static $page_title_section = 'Aanmaningen';

    public function __construct() {
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

        return view('pages.reminders.index')
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'subpages' => $subpages
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
    public function show(string $id)
    {
        //
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
