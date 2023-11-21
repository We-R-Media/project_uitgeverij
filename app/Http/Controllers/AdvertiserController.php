<?php

namespace App\Http\Controllers;

use App\AppHelpers\PostalCodeHelper;
use App\Models\Advertiser;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

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
    public function index()
    {
        $advertisers = Advertiser::whereNull('blacklisted_at')->paginate(12);

        $this->subpages = [
            'Actueel' => 'advertisers.index',
            'Zwarte lijst' => 'advertisers.blacklist',
        ];

        return view('pages.advertisers.index', compact('advertisers'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'subpagesData' => $this->getSubpages(),
            ]);
    }

    /**
     * Display a blacklist of the resource.
     */
    public function blacklist()
    {
        $advertisers = Advertiser::whereNotNull('blacklisted_at')->paginate(12);

        $this->subpages = [
            'Actueel' => 'advertisers.index',
            'Zwarte lijst' => 'advertisers.blacklist',
        ];

        return view('pages.advertisers.index', compact('advertisers'))
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
        return view('pages.advertisers.create')->with([
            'pageTitleSection'=> self::$page_title_section,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $advertiser = Advertiser::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'po_box' => $request->input('po_box'),
                'po_box' => $request->input('po_box'),
                'postal_code' => PostalCodeHelper::formatPostalCode($request->input('postal_code')),
                'city' => $request->input('city'),
                'province' => $request->input('province'),
                'phone_mobile' => $request->input('phone_mobile'),
                'phone' => $request->input('phone'),
                'comments' => $request->input('comments'),
            ]);
            $advertiser->save();
        });

        return redirect()->route('advertisers.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $advertiser_id)
    {
        $advertiser = Advertiser::findOrFail($advertiser_id);

        if($advertiser->blacklisted_at) {
            $pageTitle = $advertiser->title . ' (Zwarte lijst)';
        } else {
            $pageTitle = $advertiser->title;
        }

        return view('pages.advertisers.edit', compact('advertiser'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'pageTitle' => $advertiser->title,
                'subpagesData' => $this->getSubpages( $advertiser_id ),
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $advertiser_id)
    {
        try{
            DB::transaction(function () use($request, $advertiser_id) {
                Advertiser::where('id', $advertiser_id)->update([
                    'name' => $request->input('name'),
                    'po_box' => $request->input('po_box'),
                    'postal_code' => PostalCodeHelper::formatPostalCode($request->input('postal_code')),
                    'credit_limit' => $request->input('credit_limit'),
                    'city' => $request->input('city'),
                    'province' => $request->input('province'),
                    'phone' => $request->input('phone'),
                    'phone_mobile' => $request->input('phone_mobile'),
                    'email' => $request->input('email'),
                    'blacklisted_at' => $request->input('blacklisted_at') == 1 ? now() : null,
                ]);
            });

            Alert::toast('De relatie is succesvol bijgewerkt', 'success');

            return redirect()->route('advertisers.index');
        } catch (\Exception $e){
            Alert::toast('Er is iets fout gegaan', 'error');

            return redirect()->route('advertisers.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $advertiser_id)
    {
        $advertiser = Advertiser::findOrFail($advertiser_id);

        if($advertiser) {
            $advertiser->delete();

            Alert::toast('De relatie is verwijderd.', 'info');
        }
        return redirect()->route('advertisers.index');
    }

    public function contacts(string $advertiser_id)
    {
        $advertiser = Advertiser::findOrFail($advertiser_id);

        $aliases = [
            1 => 'Primair',
        ];

        return view('pages.advertisers.contacts', compact('advertiser','aliases'))->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $advertiser->title,
            'subpagesData' => $this->getSubpages( $advertiser_id ),
        ]);
    }

    public function contacts__store(Request $request, string $advertiser_id)
    {
        try {
            DB::transaction(function () use ($request, $advertiser_id) {
                $advertiser = Advertiser::findOrFail($advertiser_id);

                $contact = new Contact([
                    'salutation' => $request->input('salutation'),
                    'initial' => $request->input('initial'),
                    'preposition' => $request->input('preposition'),
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                    'comments' => $request->input('comments'),
                    'role' => $request->input('role'),
                ]);

                $advertiser->contacts()->save($contact);
            });

            Alert::toast('De relatie is succesvol bijgewerkt', 'success');

            return redirect()->route('advertisers.contacts', $advertiser_id);
        } catch (\Exception $e){
            Alert::toast('Er is iets fout gegaan', 'error');

            return redirect()->route('advertisers.index');
        }
    }

    public function orders(string $advertiser_id)
    {
        $advertiser = Advertiser::findOrFail($advertiser_id);

        return view('pages.advertisers.orders', compact('advertiser'))->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $advertiser->title,
            'subpagesData' => $this->getSubpages( $advertiser_id ),
        ]);
    }
}
