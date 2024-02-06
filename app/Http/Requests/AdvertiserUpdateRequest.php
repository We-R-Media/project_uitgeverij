<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\AppHelpers\MoneyHelper;
use App\AppHelpers\PostalCodeHelper;

class AdvertiserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return  [
            'first_name' => 'string|max:25',
            'last_name' => 'string|max:25',
            'salutation' => 'string|max:5|required',
            'initial' => 'string|max:5|required',
            'name' => 'string|max:25|required',
            'email' => 'string|max:25|required',
            'address' => 'string|max:25',
            'po_box' => 'string|max:100',
            'comments' => 'nullable|max:255',
            'postal_code' => 'required|string|regex:/^[1-9][0-9]{3}\s?[a-zA-Z]{2}$/',                      
            'city' => 'string|max:25',
            'province' => 'string|max:25',
            'phone_mobile' => 'string',
            'phone' => 'string',
            'comments' => 'nullable|string|max:25',
            'credit_limit' => [
                function ($attribute, $value, $fail) {
                    $numericValue = MoneyHelper::convertToNumeric($value);

                    if (!is_numeric($numericValue)) {
                        $fail('The '.$attribute.' must be a valid numeric value.');
                    }
                },
            ],
        ];
    }
}
