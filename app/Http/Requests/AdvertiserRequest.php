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
            'name' => 'required|unique:advertisers|string|max:25',
            'email' => 'required|unique:advertisers|string|max:25',
            'po_box' => 'required|unique:advertisers|string|max:25',
            'postal_code' => 'required|unique:advertisers|string|max:25',
            'city' => 'required|unique:advertisers|string|max:25',
            'province' => 'required|unique:advertisers|string|max:25',
            'phone_mobile' => 'required|unique:advertisers|string',
            'phone' => 'required|unique:advertisers|string',
            'contact_id' => 'required|unique:advertisers|integer',
            // 'comments' => 'required|unique:advertisers|string|max:25', 
        ];
    }
}
