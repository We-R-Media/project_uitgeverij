<?php

namespace App\Http\Controllers;

use App\Models\Advertiser;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvertiserController extends Controller
{
    private static $page_title_singular = 'Relatie';
    private static $page_title_plural = 'Relaties';

    public function __construct()
    {
        $this->subpages = [
            'Bedrijfsgegevens' => '/',
            'ContactPersonen' => '/',
            'Orders' => '/',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertisers = Advertiser::all();

        $subpages = $this->getSubpages() ?? false;

        return view('pages.advertisers', compact('advertisers'))
            ->with([
                'pageTitleSection' => self::$page_title_plural,
                'pageTitle' => self::$page_title_singular,
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
        $contactId = $request->input('contact_id');

        DB::transaction(function () use ($request, $contactId) {
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
<<<<<<< HEAD

            $contact = Contact::find( $contactId );
            $contact->advertiser()->associate($advertiser);

=======
            $contact = Contact::find($contactId);
            $contact->advertisers()->associate($advertiser);
>>>>>>> aec960fad002582c2921211616f88ac6549d6c80
            $advertiser->save();
        });

<<<<<<< HEAD
        return redirect()->back();
=======
    public function process(Request $request) {

        return redirect()->route('orders.page');
    }

    public function details()
    {
        return view('pages.tables.advertisers-table');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        if($request->has('showContacts')) {
            $contacts = Contact::all();
            return view('pages.tables.advertisers-table', compact('contacts'));
        }
        else if($request->has('showAdvertisers')) {
            $advertisers = Advertiser::all();
            // $advertisers = Advertiser::with('contact')->get();

            // dd($advertisers);
            return view('pages.tables.advertisers-table', compact('advertisers'));
        }
>>>>>>> aec960fad002582c2921211616f88ac6549d6c80
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
