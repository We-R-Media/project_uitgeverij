<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'name' => 'required|string|unique:advertisers|max:25',
            'email' => 'required|string|unique:advertisers|max:25',
            'po_box' => 'required|string|max:25',
            'postal_code' => [
                'required',
                'regex:/^[1-9][0-9]{3} ?(?!sa|sd|ss|SA|SD|SS)[A-Z]{2}$/i',
            ],
            'city' => 'required|string|max:25',
            'province' => 'required|string|max:25',
            'phone_mobile' => 'string|required|unique:advertisers',
            'phone' => 'string|required|unique:advertisers',
            'contact_id' => 'integer|unique:advertisers',
            'comments' => 'required|string|max:25',
        ];
    }
}
