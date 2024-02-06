<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\AppHelpers\MoneyHelper;
use App\AppHelpers\PostalCodeHelper;


class AdvertiserRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $alt_invoice = ($this->input('alt_invoice'));

        dd($alt_invoice);
        // Efficienter maken fix fix fix
        return  [
            'first_name' => 'nullable|string|max:25',
            'last_name' => 'required|string|max:25',
            'salutation' => 'required|string|max:25',
            'initial' => 'required|string|max:25',
            'name' => 'required|unique:advertisers|string|max:25',
            'email' => 'required|unique:advertisers|string|max:25',
            'address' => 'required|string|max:25',
            'postal_code' => 'required|string|regex:/^[1-9][0-9]{3}\s?[a-zA-Z]{2}$/',                      
            'po_box' => 'nullable|string|max:100',
            'comments' => 'nullable|max:255',
            'city' => 'nullable|string|max:50',
            'province' => 'nullable|string|max:50',
            'phone_mobile' => 'nullable|unique:advertisers|string',
            'phone' => 'nullable|unique:advertisers|string',
            'comments' => 'nullable|string|max:255',
            'credit_limit' => [
                function ($attribute, $value, $fail) {
                    $numericValue = MoneyHelper::convertToNumeric($value);

                    if (!is_numeric($numericValue)) {
                        $fail('The '.$attribute.' must be a valid numeric value.');
                    }
                },
            ],
            'alt_name' => 'required_if:alt_invoice,1|string|max:25',
            'alt_email' => 'required_if:alt_invoice,1|string|max:25',
            'alt_city' => 'required_if:alt_invoice,1|string|max:25',
            'alt_postal_code' => 'required_if:alt_invoice,1|string|regex:/^[1-9][0-9]{3}\s?[a-zA-Z]{2}$/',                      
            'alt_province' => 'required_if:alt_invoice,1|string|max:25',
            'alt_po_box' => 'required_if:alt_invoice,1|string|max:100',
        ];
    }
}
