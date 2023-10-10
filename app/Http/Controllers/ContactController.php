<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('pages.settings.contacts');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $contact = DB::transaction(function () use($request) {
            Contact::create([
                'first_name' => $request->input('first_name'),
                'initial' => $request->input('initial'),
                'insertion' => $request->input('insertion'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
            ]);
        });

        return redirect()->route('contacts.page');
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
    public function show(Contact $contact)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
