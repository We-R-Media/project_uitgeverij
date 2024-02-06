<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name' => 'string|max:25',
            'last_name' => 'required|string|max:25',
            'initial' => 'required|string|max:4',
            'salutation' => 'required|string|max:5',
            'preposition' => 'nullable|string|max:25',
            'email' => 'required|string|max:25',
            'phone' => 'string|max:25',
            'comments' => 'nullable|string|max:25',
            'role' => 'nullable|integer|max:1', 
        ];
    }
}
