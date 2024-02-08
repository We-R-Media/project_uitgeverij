<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Advertiser;
use App\AppHelpers\PostalCodeHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class AltAddress extends Component
{
    public $advertiser;
    public $alt_invoice;
    public $alt_name;
    public $alt_po_box;
    public $alt_postal_code;
    public $alt_city;
    public $alt_province;
    public $alt_email;
    public $showForm = false;

    protected $rules = [
        'alt_name' => 'required',
        'alt_po_box' => 'required',
        'alt_postal_code' => 'required',
        'alt_city' => 'required',
        'alt_province' => 'required',
        'alt_email' => 'required',
    ];

    public function mount($advertiser)
    {
        $this->advertiser = $advertiser;
        $this->alt_name = $advertiser->alt_name;
        $this->alt_po_box = $advertiser->alt_po_box;
        $this->alt_postal_code = $advertiser->alt_postal_code;
        $this->alt_city = $advertiser->alt_city;
        $this->alt_province = $advertiser->alt_province;
        $this->alt_email = $advertiser->alt_email;
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
    }

    public function submitForm()
    {
        $this->validate([
            'alt_name' => 'required|unique:advertisers|string',
            'alt_po_box' => 'required|string',
            'alt_postal_code' => 'required|string',
            'alt_city' => 'required|string',
            'alt_province' => 'required|string',
            'alt_email' => 'required|email',
        ]);

        DB::transaction(function () {

            $formattedPostalCode = PostalCodeHelper::formatPostalCode($this->alt_postal_code);

            $this->advertiser->update([
                'alt_address_at' => Carbon::now(),
                'alt_name' => $this->alt_name,
                'alt_po_box' => $this->alt_po_box,
                'alt_postal_code' => $formattedPostalCode,
                'alt_city' => $this->alt_city,
                'alt_province' => $this->alt_province,
                'alt_email' => $this->alt_email,
            ]);        
        });
        // $this->showForm = false;
    }

    public function render()
    {
        return view('livewire.alt-address');
    }
}
