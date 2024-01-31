<?php

namespace App\Http\Controllers;

use App\AppHelpers\PostalCodeHelper;
use App\AppHelpers\MoneyHelper;
use App\Http\Requests\AdvertiserRequest;
use App\Models\Advertiser;
use App\Models\Contact;

use App\Services\SearchService;
use App\Services\AdvertiserService;

use Illuminate\Contracts\View\View;

use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AdvertiserExport;
use App\Imports\AdvertiserImport;

use App\Http\Resources\AdvertiserResource;



class AdvertiserController extends Controller
{
    protected $searchService;
    protected $advertiserService;

    private static $page_title_section = 'Relaties';

    public function __construct(SearchService $searchService, AdvertiserService $advertiserService)
    {
        $this->searchService = $searchService;
        $this->advertiserService = $advertiserService;

        $this->subpages = [
            'Adverteerder' => 'advertisers.edit',
            'Contactpersonen' => 'advertisers.contacts',
            'Orders' => 'advertisers.orders',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : View
    {
        $searchQuery = $request->input('search');

        $advertisers = Advertiser::whereNull('blacklisted_at')
            ->when($searchQuery, function ($query) use ($searchQuery) {
                $this->searchService->search($query, $searchQuery, [
                    'name',
                    'po_box',
                    'postal_code',
                    'city',
                    'email'
                ]);
            })
            ->whereNull('deactivated_at')
            ->withTrashed()
            ->paginate(15);

        $this->subpages = [
            'Actueel' => 'advertisers.index',
            'Inactief' => 'advertisers.inactive',
            'Zwarte lijst' => 'advertisers.blacklist',
        ];

        if(Gate::allows('isSeller')) {
            unset($this->subpages['Inactief']);
            unset($this->subpages['Zwarte lijst']);
        }

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
        $advertisers = Advertiser::whereNotNull('blacklisted_at')->paginate(15);

        $this->subpages = [
            'Actueel' => 'advertisers.index',
            'Inactief' => 'advertisers.inactive',
            'Zwarte lijst' => 'advertisers.blacklist',
        ];

        return view('pages.advertisers.index', compact('advertisers'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'subpagesData' => $this->getSubpages(),
            ]);
    }

    public function inactive()
    {
        $advertisers = Advertiser::whereNotNull('deactivated_at')->paginate(15);

        $this->subpages = [
            'Actueel' => 'advertisers.index',
            'Inactief' => 'advertisers.inactive',
            'Zwarte lijst' => 'advertisers.blacklist',
        ];

        return view('pages.advertisers.index', compact('advertisers'))->with([
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
    public function store(AdvertiserRequest $request)
    {
        $advertiser_id = $this->advertiserService->storeAdvertiser($request);

        if ($advertiser_id !== null) {
            return redirect()->route('advertisers.edit', $advertiser_id);
        } else {
            return redirect()->route('advertisers.index');
        }
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
    public function update(AdvertiserRequest $request, string $advertiser_id)
    {
        $advertiser_id = $this->advertiserService->updateAdvertiser($request, $advertiser_id);


        // Apart zetten in service bestand

        $validatedData = $request->validated();

        try{
            DB::transaction(function () use($validatedData, $advertiser_id) {
                Advertiser::where('id', $advertiser_id)->update(
                    $validatedData, [
                    'blacklisted_at' => $validatedData->input('blacklisted') == 1 ? now() : null,
                    'deactivated_at' => $validatedData->input('active') == 0 ? now() : null,
                ]);

                Contact::where('id', $advertiser_id)
                    ->orWhere('email', $validatedData->email)
                    ->first()
                    ->update([
                        'salutation' => $validatedData->salutation,
                        'initial' => $validatedData->initial,
                        'role' => 1,
                        'email' => $validatedData->email,
                        'first_name' => $validatedData->first_name,
                        'last_name' => $validatedData->last_name,
                        'phone' => $validatedData->phone,
                    ]);

            });

            Alert::toast('De relatie is succesvol bijgewerkt', 'success');

            return redirect()->route('advertisers.index');
        } catch (\Exception $e){
            Alert::toast('Er is iets fout gegaan', 'error');

        if ($advertiser_id !== null) {
            return redirect()->route('advertisers.edit', $advertiser_id);
        } else {
            return redirect()->route('advertisers.index');
        }
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $advertiser_id)
    {
        $advertiser_id = $this->advertiserService->deleteAdvertiser($advertiser_id);

        if($advertiser_id !== null) {
            return redirect()->route('advertisers.index');
        }
    }

        /**
     * Restore a trashed advertiser.
     *
     * @param  int  $advertiser_id  The ID of the trashed order line to restore.
     * @return void
     */
    public function restore(string $advertiser_id)
    {
        $advertiser_id = $this->advertiserService->restoreAdvertiser($advertiser_id);

        if($advertiser_id !== null) {
            return redirect()->route('advertisers.index');
        }
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

    public function contacts__destroy(string $advertiser_id,string $contact_id) {

        $contact = Contact::findOrFail($contact_id);
        $advertiser = Advertiser::findOrFail($advertiser_id);

        if($contact) {
            $contact->delete();

            Alert::toast('De contactpersoon is verwijderd', 'info');
        }
        return redirect()->route('advertisers.contacts', $advertiser->id);
    }

            /**
     * Restore a trashed contact.
     *
     * @param  int  $contact_id  The ID of the trashed contact to restore.
     * @return void
     */
    public function contacts__restore(string $contact_id, string $advertiser_id) {
        try
        {
            $contact = Contact::onlyTrashed()->findOrFail($contact_id);
            $contact->restore();

            Log::info('Contact succesvol hersteld:' . $contact->id);
            Alert::toast('Contact succesvol hersteld', 'success');
        } catch (ModelNotFoundException $e) {
            Log::error('Databasefout bij herstellen contactpersoon: ' . $e->getMessage());
            Alert::toast('Er is een fout opgetreden bij het herstellen van de contactpersoon', 'error');
        }
        return redirect()->route('advertisers.contacts', $advertiser_id);
    }

    public function orders(string $advertiser_id)
    {
        $advertiser = Advertiser::findOrFail($advertiser_id);
        $user_id = Auth::user()->id;

        return view('pages.advertisers.orders', compact('advertiser'))->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $advertiser->title,
            'subpagesData' => $this->getSubpages( $advertiser_id ),
        ]);
    }

    public function export(Request $request)
    {
        $selectedAdvertisers = $request->input('selected_values', []); 
        return Excel::download(new AdvertiserExport($selectedAdvertisers), 'advertisers.xlsx');
    }

    public function import(Request $request)
    {
        // Assuming you have a 'file_name' field in your form or request.
        $fileName = $request->input('file_name');
        
        // Specify the directory within the public path where the file is located.
        $directory = public_path('excel\\advertisers.xlsx'); // Use double backslashes for the directory separator on Windows.

    
        // Check if the file exists before attempting to import.
        if (file_exists($directory . $fileName)) {
            // Import the data from the specified Excel file.
            Excel::import(new AdvertiserImport, $directory);
            // Excel::import(new ContactImport, $directory);

            return redirect()->route('advertisers.index')->with('success', 'Import successful!');
        } else {
            // Redirect with an error message if the file does not exist.
            return redirect()->route('advertisers.index')->with('error', 'File not found!');
        }
    }
}
