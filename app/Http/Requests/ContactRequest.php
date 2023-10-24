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
            'first_name' => 'required|string|unique:contacts|max:25',
            'initial' => 'required|string|unique:contacts|max:2',
            'preposition' => 'nullable|string|unique:contacts|max:25',
            'last_name' => 'required|string|unique:contacts|max:25',
            'email' => 'required|string|unique:contacts|max:25',
        ];
    }
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    // public function messages(): array
    // {
    //     return [
    //         'first_name.required' => 'Voornaam is verplicht.',
    //         'first_name.string' => 'Voornaam moet een string zijn.',
    //         'first_name.unique' => 'Deze voornaam is al in gebruik.',
    //         'first_name.max' => 'Voornaam mag maximaal 25 tekens bevatten.',

    //         'initial.required' => 'Initiaal is verplicht.',
    //         'initial.alpha' => 'Initiaal moet letters bevatten.',
    //         'initial.unique' => 'Deze initiaal is al in gebruik.',
    //         'initial.max' => 'Initiaal mag maximaal 2 tekens bevatten.',

    //         'preposition.required' => 'Tussenvoegsel is verplicht.',
    //         'preposition.string' => 'Tussenvoegsel moet een string zijn.',
    //         'preposition.unique' => 'Dit tussenvoegsel is al in gebruik.',
    //         'preposition.max' => 'Tussenvoegsel mag maximaal 25 tekens bevatten.',

    //         'last_name.required' => 'Achternaam is verplicht.',
    //         'last_name.string' => 'Achternaam moet een string zijn.',
    //         'last_name.unique' => 'Deze achternaam is al in gebruik.',
    //         'last_name.max' => 'Achternaam mag maximaal 25 tekens bevatten.',

    //         'email.required' => 'E-mailadres is verplicht.',
    //         'email.string' => 'E-mailadres moet een string zijn.',
    //         'email.unique' => 'Dit e-mailadres is al in gebruik.',
    //         'email.max' => 'E-mailadres mag maximaal 25 tekens bevatten.',
    //     ];
    // }
}
