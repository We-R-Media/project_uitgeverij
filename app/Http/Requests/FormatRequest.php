<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormatRequest extends FormRequest
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
            'format_name' => 'required|unique:layouts|string|max:25',
            'format_size' => 'required|unique:layouts|string|max:25',
            'format_measurement' => 'required|unique:layouts|string|max:25',
            'format_price' => 'required|double',
        ];
    }
}
