<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();


        return view('pages.settings.reminders', compact('contacts'));
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
        $contactId = $request->input('contact');

        $reminder = DB::transaction(function () use($request, $contactId) {
           $reminder = Reminder::create([
                'period_first' => $request->input('period_first'),
                'period_second' => $request->input('period_second'),
                'period_third' => $request->input('period_third'),
                'administration_cost_first' => $request->input('administration_cost_first'),
                'administration_cost_second' => $request->input('administration_cost_second'),
                'contact_id' => $contactId,
            ]);

            $contact = Contact::find($contactId);
            $contact->reminders()->save($reminder);
        });

        return redirect()->route('reminders.index');
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
