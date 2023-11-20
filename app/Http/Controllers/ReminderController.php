<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reminder;

class ReminderController extends Controller
{
    private static $page_title_section = 'Aanmaningen';

    public function __construct() {
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
        $reminders = Reminder::paginate(12);

        return view('pages.reminders.index',compact('reminders'))
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
        return view('pages.reminders.create')
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
            Reminder::create([
                'period_first' => $request->input('period_first'),
                'period_second' => $request->input('period_second'),
                'period_third' => $request->input('period_third'),
                'administration_cost_first' => $request->input('administration_first'),
                'administration_cost_second' => $request->input('administration_second'),
                'contact_debtor' => $request->input('contact_debtor'),
            ]);
        });

        return redirect()->route('reminders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $reminder_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $reminder_id)
    {
        $reminder = Reminder::findOrFail($reminder_id);

        return view('pages.reminders.edit', compact('reminder'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'subpagesData' => $this->getSubpages(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $reminder_id)
    {
        DB::transaction(function () use($request, $reminder_id) {
            Reminder::where('id', $reminder_id)->update([
                'period_first' => $request->input('period_first'),
                'period_second' => $request->input('period_second'),
                'period_third' => $request->input('period_third'),
                'administration_cost_first' => $request->input('administration_first'),
                'administration_cost_second' => $request->input('administration_second'),
                'contact_debtor' => $request->input('contact_debtor'),
            ]);
        });

        return redirect()->route('reminders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $reminder_id)
    {
        //
    }
}
