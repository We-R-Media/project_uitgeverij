<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaxRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'country' => 'required|string|unique:taxes',
            'zero' => 'required|integer|max:100',
            'low' => 'required|integer|max:100',
            'high' => 'required|integer|max:100',
        ];
    }
}
