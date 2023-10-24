<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertiserResource;
use App\Models\Advertiser;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Resources\CompanyResource;
use App\Http\Requests\AdvertiserRequest;
use Illuminate\Support\Facades\DB;

class AdvertiserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertisers = Advertiser::all();
        $contacts = Contact::all();

        

        return view('pages.advertisers', compact('advertisers', 'contacts'));
    }

    public function showDetails() {

        $advertisers = Advertiser::all();
        $contacts = Contact::all();

        return view('pages.tables.advertisers-table', compact('advertisers', 'contacts'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(AdvertiserRequest $request)
    {
        $contactId = $request->input('contact_id');

    
        DB::transaction(function () use($request, $contactId) {
            $advertiser = Advertiser::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'po_box' => $request->input('po_box'),
                'postal_code' => $request->input('postal_code'),
                'city' => $request->input('city'),
                'province' => $request->input('province'),
                'phone_mobile' => $request->input('phone_mobile'),
                'phone' => $request->input('phone'),
                'contact_id' => $request->input('contact_id'),
                'comments' => $request->input('comments'),
            ]);
            $contact = Contact::find($contactId);
            $contact->advertiser()->associate($advertiser);
            $advertiser->save();
        });    
        return redirect()->route('advertisers.page');
    }

    public function processForm() {
        return redirect()->route('orders.page');
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
    public function show(Advertiser $advertiser)
    {
        $advertiser = Advertiser::all();
        return AdvertiserResource::collection($advertiser);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advertiser $advertiser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Advertiser $advertiser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advertiser $advertiser)
    {
        //
    }
}
