<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        try {
            $contact = DB::transaction(function () use($request) {
                Contact::create([
                    'first_name' => $request->input('first_name'),
                    'initial' => $request->input('initial'),
                    'preposition' => $request->input('preposition'),
                    'last_name' => $request->input('last_name'),
                    'email' => $request->input('email'),
                ]);
            });

            Alert::toast('De adverteerder is succesvol bijgewerkt', 'success');

            return redirect()->route('contacts.index');
        } catch (\Exception $e){
            Alert::toast('Er is iets fout gegaan', 'error');

            return redirect()->route('contacts.index');
        }
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
