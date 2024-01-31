<?php

// app/Services/AdvertiserService.php

namespace App\Services;

use App\AppHelpers\PostalCodeHelper;
use App\AppHelpers\MoneyHelper;

use App\Models\Advertiser;
use App\Models\Contact;

use App\Services\SearchService;
use App\Services\AdvertiserService;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class AdvertiserService
{
    public static function storeAdvertiser($request)
    {
        $advertiser_id = null;

        try {
            DB::transaction(function () use ($request, &$advertiser_id) {
                $advertiser = Advertiser::create([
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'salutation' => $request->input('salutation'),
                    'initial' => $request->input('initial'),
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'address' => $request->input('address'),
                    'po_box' => $request->input('address'), // Note: Should this be 'po_box'?
                    'postal_code' => PostalCodeHelper::formatPostalCode($request->input('postal_code')),
                    'city' => $request->input('city'),
                    'credit_limit' => MoneyHelper::convertToNumeric($request->input('credit')),
                    'province' => $request->input('province'),
                    'phone_mobile' => $request->input('phone_mobile'),
                    'phone' => $request->input('phone'),
                    'comments' => $request->input('comments'),
                ]);

                $advertiser_id = $advertiser->id;

                $contact = Contact::firstOrNew([
                    'advertiser_id' => $advertiser_id,
                    'salutation' => $request->input('salutation'),
                    'initial' => $request->input('initial'),
                    'role' => 1,
                    'email' => $request->input('email'),
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'phone' => $request->input('phone'),
                ]);

                $advertiser->contacts()->save($contact);
                $contact->save();
            });

            Alert::toast('De relatie is successvol aangemaakt', 'success');
            return $advertiser_id; 
        } catch (\Exception $e) {
            dd($e);
            Alert::toast('Er is iets fout gegaan', 'error');
            return null; 
        }
    }

    public static function updateAdvertiser($request, $advertiser_id)
    {
        try {
            DB::transaction(function () use ($request, $advertiser_id) {
                Advertiser::where('id', $advertiser_id)->update([
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'salutation' => $request->input('salutation'),
                    'initial' => $request->input('initial'),
                    'name' => $request->input('name'),
                    'po_box' => $request->input('po_box'),
                    'postal_code' => PostalCodeHelper::formatPostalCode($request->input('postal_code')),
                    'credit_limit' => MoneyHelper::convertToNumeric($request->input('credit')),
                    'city' => $request->input('city'),
                    'province' => $request->input('province'),
                    'phone' => $request->input('phone'),
                    'phone_mobile' => $request->input('phone_mobile'),
                    'email' => $request->input('email'),
                    'blacklisted_at' => $request->input('blacklisted') == 1 ? now() : null,
                    'deactivated_at' => $request->input('active') == 0 ? now() : null,
                ]);

                Contact::where('advertiser_id', $advertiser_id)
                    ->orWhere('email', $request->input('email'))
                    ->first()
                    ->update([
                        'salutation' => $request->input('salutation'),
                        'initial' => $request->input('initial'),
                        'role' => 1,
                        'email' => $request->input('email'),
                        'first_name' => $request->input('first_name'),
                        'last_name' => $request->input('last_name'),
                        'phone' => $request->input('phone'),
                    ]);
            });

            Alert::toast('De relatie is succesvol bijgewerkt', 'success');

            return $advertiser_id;

            return redirect()->route('advertisers.index');
        } catch (\Exception $e) {
            Alert::toast('Er is iets fout gegaan', 'error');

            return redirect()->route('advertisers.index');
        }
    }

    public static function deleteAdvertiser($advertiser_id)
    {
        $advertiser = Advertiser::findOrFail($advertiser_id);

        if($advertiser) {
            $advertiser->delete();

            Alert::toast('De relatie is verwijderd.', 'info');
        }
        return redirect()->route('advertisers.index');
    }

    public static function restoreAdvertiser($advertiser_id)
    {
        try
        {
            $advertiser = Advertiser::onlyTrashed()->findOrFail($advertiser_id);
            $advertiser->restore();

            Log::info('Relatie succesvol hersteld:' . $advertiser->id);
            Alert::toast('Relatie succesvol hersteld' , 'success');
        } catch (ModelNotFoundException $e) {
            Log::error('Relatie niet gevonden:' . $advertiser_id);
            Alert::toast('Relatie niet gevonden', 'error');
        } catch (QueryException $e) {
            Log::error('Databasefout bij herstellen relatie: ' . $e->getMessage());
            Alert::toast('Er is een fout opgetreden bij het herstellen van de relatie', 'error');
        }
        return redirect()->route('advertisers.index');
    }
}
