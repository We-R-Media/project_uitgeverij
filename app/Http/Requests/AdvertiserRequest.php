<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\AppHelpers\MoneyHelper;
use App\AppHelpers\PostalCodeHelper;
use Illuminate\Validation\Rule;


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
        return  [
            'first_name' => 'nullable|string|max:25|',
            'last_name' => 'required|string|max:25',
            'salutation' => 'required|string|max:25',
            'initial' => 'required|string|max:25',
            'name' => [
                Rule::unique('advertisers')->ignore($this->advertiser_id),
                'required',
                'string',
                'max:50',
            ],
            'email' => [
                Rule::unique('advertisers')->ignore($this->advertiser_id),
                'required',
                'string',
                'max:50',
            ],
            'address' => 'required|string|max:50',
            'postal_code' => 'required|string|regex:/^[1-9][0-9]{3}\s?[a-zA-Z]{2}$/',                      
            'po_box' => 'nullable|string|max:100',
            'comments' => 'nullable|max:255',
            'city' => 'nullable|string|max:50',
            'province' => 'nullable|string|max:50',
            'phone_mobile' => [
                Rule::unique('advertisers')->ignore($this->advertiser_id),
                'nullable',
                'string',
            ],
            'phone' => [
                Rule::unique('advertisers')->ignore($this->advertiser_id),
                'nullable',
                'string',
            ],
            'comments' => 'nullable|string|max:255',
            'credit_limit' => [
                function ($attribute, $value, $fail) {
                    $numericValue = MoneyHelper::convertToNumeric($value);

                    if (!is_numeric($numericValue)) {
                        $fail('The '.$attribute.' must be a valid numeric value.');
                    }
                },
            ],
            'blacklisted_at' => [
                Rule::unique('advertisers')->ignore($this->advertiser_id),
                'nullable'
            ],
            'deactivated_at' => [
                Rule::unique('advertisers')->ignore($this->advertiser_id),
                'nullable'
            ],
        ];
    }
}
