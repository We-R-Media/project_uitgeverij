<?php

namespace App\Http\Controllers;

use App\Models\Advertiser;
use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdvertiserController extends Controller
{
    private static $page_title_section = 'Relaties';

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
    public function index(Request $request, $filter = null)
    {
        if ( $filter == 'blacklisted' ) {
            $advertisers = Advertiser::whereNotNull('blacklisted_at')->paginate(10);
        } else {
            $advertisers = Advertiser::latest()->paginate(10);
        }

        $subpages_root = [
            'Actueel' => '/relaties',
            'Geannuleerd' => '/relaties/blacklisted',
        ];

        return view('pages.advertisers.index', compact('advertisers'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'subpages' => $subpages_root
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

        try {
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

            Alert::toast('De adverteerder is succesvol aangemaakt', 'success');

            return redirect()->route('advertisers.index');
        } catch (\Exception $e){
            Alert::toast('Er is iets fout gegaan', 'error');

            return redirect()->route('advertisers.index');
        }
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
                'pageTitleSection' => self::$page_title_section,
                'pageTitle' => $advertiser->title,
                'subpages' => $subpages
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
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

            Alert::toast('De adverteerder is succesvol bijgewerkt', 'success');

            return redirect()->route('advertisers.index');
        } catch (\Exception $e){
            Alert::toast('Er is iets fout gegaan', 'error');

            return redirect()->route('advertisers.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $advertiser = Advertiser::find($id);

        if( $advertiser ) {
            $advertiser->delete();

            Alert::toast('De relatie is verwijderd.', 'info');
        }

        return redirect()->route('advertisers.index');
    }


    public function contacts(string $id)
    {
        $advertiser = Advertiser::findOrFail($id);
        $subpages = $this->getSubpages( ) ?? false;

        return view('pages.advertisers.contacts')->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $advertiser->title,
            'subpages' => $subpages
        ]);
    }

    public function orders(string $id)
    {
        $advertiser = Advertiser::findOrFail($id);
        $subpages = $this->getSubpages() ?? false;

        return view('pages.advertisers.orders')->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $advertiser->title,
            'subpages' => $subpages
        ]);
    }
}
