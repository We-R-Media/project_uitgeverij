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
            'Adverteerder' => 'advertisers.edit',
            'Contactpersonen' => 'advertisers.contacts',
            'Orders' => 'advertisers.orders',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertisers = Advertiser::paginate();

        return view('pages.advertisers.index', compact('advertisers'))
            ->with([
                'pageTitleSection' => self::$page_title_plural,
                'seoTitle' => self::$page_title_singular,
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
            $contact = Contact::find($contactId);
            $contact->advertisers()->associate($advertiser);
            $advertiser->save();
        });

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $advertiser = Advertiser::findOrFail($id);
        $subpages = $this->getSubpages() ?? false;

        return view('pages.advertisers.edit', compact('advertiser'))
            ->with([
                'pageTitleSection' => self::$page_title_plural,
                'pageTitle' => $advertiser->title,
                'seoTitle' => 'Bewerk ' . self::$page_title_singular,
                'subpages' => $subpages
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::transaction(function () use($request, $id) {
            Advertiser::where('id', $id)->update([
                'name' => $request->input('name'),
                'po_box' => $request->input('po_box'),
                'postal_code' => $request->input('postal_code'),
                'city' => $request->input('city'),
                'province' => $request->input('province'),
                'phone' => $request->input('phone'),
                'phone_mobile' => $request->input('phone_mobile'),
                'email' => $request->input('email'),
            ]);
        });
        return redirect()->route('advertisers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function contacts(string $id)
    {
        $subpages = $this->getSubpages( $id ) ?? false;

        return view('pages.advertisers.contacts')->with([
            'pageTitleSection' => self::$page_title_plural,
            'seoTitle' => self::$page_title_singular,
            'subpages' => $subpages
        ]);
    }

    public function orders(string $id)
    {
        $subpages = $this->getSubpages( $id ) ?? false;

        return view('pages.advertisers.orders')->with([
            'pageTitleSection' => self::$page_title_plural,
            'seoTitle' => self::$page_title_singular,
            'subpages' => $subpages
        ]);
    }
}
