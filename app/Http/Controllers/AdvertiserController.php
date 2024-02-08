<?php

namespace App\Http\Controllers;

use App\AppHelpers\PostalCodeHelper;
use App\AppHelpers\MoneyHelper;
use App\Http\Requests\AdvertiserRequest;
use App\Http\Requests\ContactRequest;
use App\Models\Advertiser;
use App\Models\Contact;
use Carbon\Carbon;

use App\Services\SearchService;

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

    private static $page_title_section = 'Relaties';

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;

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
        try {

            $advertiser_id = null;


            DB::transaction(function () use ($request, &$advertiser_id) {
                
                // Validation for advertisers create form
                $validatedData = $request->validated();

                // Checks if the postal code passed the regex and converts this to the proper format
                if($validatedData['postal_code']) {
                    $formattedPostalCode = PostalCodeHelper::formatPostalCode($validatedData['postal_code']);
                }

                // Sets the formatted field as postal code

                // Rest of the query
                $advertiser = Advertiser::create($validatedData);

                $advertiser->postal_code = $formattedPostalCode;
    
                // Saves the advertiser and retrieves it's id.
                $advertiser->save();

                $advertiser_id = $advertiser->id;


                $contact = Contact::firstOrNew([
                    'salutation' => $advertiser->salutation,
                    'initial' => $advertiser->initial,
                    'role' => 1,
                    'email' => $advertiser->email,
                    'first_name' => $advertiser->first_name,
                    'last_name' => $advertiser->last_name,
                    'phone' => $advertiser->phone,
                ]);

                $advertiser->contacts()->save($contact);
            
            Alert::toast('Relatie is succesvol aangemaakt', 'success');
            });
        } catch (\Exception $e) {
            Alert::toast('Er is iets fout gegaan', 'error');
            return redirect()->route('advertisers.index');
        }
            return redirect()->route('advertisers.edit', $advertiser_id);
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
        try {
            DB::transaction(function () use($advertiser_id, $request) {
             $advertiser = Advertiser::findOrFail($advertiser_id);

            $request->merge(['advertiser_id' => $advertiser->id]); // Pass the advertiser ID to the request
            $validatedData = $request->validated();

            // dd($validatedData);

            if ($validatedData['postal_code']) {
                $formattedPostalCode = PostalCodeHelper::formatPostalCode($validatedData['postal_code']);
            }

            // $validatedData['alt_postal_code'] = $formattedAltPostalCode;
            $validatedData['postal_code'] = $formattedPostalCode;

            $advertiser->update($validatedData);






            Contact::where('id', $advertiser_id)
            ->orWhere('email', $validatedData['email'])
            ->first()
            ->update([
                'salutation' => $validatedData['salutation'],
                'initial' => $validatedData['initial'],
                'email' => $validatedData['email'],
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'phone' => $validatedData['phone'],
            ]);

            Advertiser::where('id', $advertiser_id)->update([
                'blacklisted_at' => $request->input('blacklisted') == 1 ? now() : null,
                'deactivated_at' => $request->input('active') == 0 ? now() : null,
            ]);
            
        });

            Alert::toast('De relatie is succesvol bijgewerkt', 'success');

            return redirect()->route('advertisers.index');
        } catch (\Exception $e){
            dd($e);
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
        $advertiser = Advertiser::findOrFail($advertiser_id);

        if($advertiser) {
            $advertiser->delete();

            Alert::toast('De relatie is verwijderd.', 'info');
        }
        return redirect()->route('advertisers.index');
    }

        /**
     * Restore a trashed advertiser.
     *
     * @param  int  $advertiser_id  The ID of the trashed order line to restore.
     * @return void
     */
    public function restore(string $advertiser_id)
    {
        $advertiser = Advertiser::onlyTrashed()->findOrFail($advertiser_id);
        $advertiser->restore();

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



    public function contacts__store(ContactRequest $request, string $advertiser_id)
    {
        try {
            DB::transaction(function () use ($request, $advertiser_id) {
                $advertiser = Advertiser::findOrFail($advertiser_id);

                // $validatedData = $request->validated();
                $validatedData = $request->validated();
                $contact = Contact::create($validatedData);
                $advertiser->contacts()->save($contact);
            });

            Alert::toast('Contact is succesvol aangemaakt', 'success');

            return redirect()->route('advertisers.contacts', $advertiser_id);
        } catch (\Exception $e){
            dd($e);
            Alert::toast('Er is iets fout gegaan' . $e, 'error');

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
     * Assign primary role to contact
     *
     * @param string $contact_id
     * @return void
     */    
    public function contacts__primary(string $advertiser_id, string $contact_id)
    {
        $advertiser = Advertiser::findOrFail($advertiser_id);
        $contact = Contact::findOrFail($contact_id);


        try {
            
            $contact->where('role', 1)->update([
                'role' => 0,
            ]);

            DB::transaction(function () use ($advertiser, $contact) {
                Contact::where('advertiser_id', $advertiser->id)
                    ->where('role', 1)
                    ->update(['role' => null]);
    
                $contact->update(['role' => 1]);
            });

            Alert::toast('De contactpersoon is primair gemaakt', 'info');
            return redirect()->route('advertisers.contacts', $advertiser->id);

        } catch (\Exception $e) {
            Alert::toast('Er is iets fout gegaan', 'error');
            return redirect()->route('advertisers.contacts', $advertiser->id);
        }
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
