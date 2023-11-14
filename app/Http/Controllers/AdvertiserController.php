<?php

namespace App\Http\Controllers;

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
                'postal_code' => $request->input('postal_code'),
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
        $advertiser = Advertiser::findOrFail($id);
        
        if($advertiser) {
            $advertiser->delete();

            Alert::toast('De relatie is verwijderd.', 'info');
        }
        return redirect()->route('advertisers.index');
    }

    public function contacts(string $id)
    {
        $advertiser = Advertiser::findOrFail($id);
        $subpages = $this->getSubpages( $id ) ?? false;

        $aliases = [
            1 => 'Primair',
        ];


        return view('pages.advertisers.contacts', compact('advertiser'))->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $advertiser->title,
            'subpages' => $subpages,
            'aliases' => $aliases,
        ]);
    }

    public function contacts__store(Request $request, string $id)
    {
        DB::transaction(function () use ($request, $id) {
            $advertiser = Advertiser::findOrFail($id);
    
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
        return redirect()->route('advertisers.contacts', $id);
    }

    public function orders(string $id)
    {
        $advertiser = Advertiser::findOrFail($id);
        // $orders = Advertiser::with('orders')->get();

        // dd($advertiser);

        $subpages = $this->getSubpages( $id ) ?? false;

        return view('pages.advertisers.orders', compact('advertiser'))->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $advertiser->title,
            'subpages' => $subpages
        ]);
    }
}
