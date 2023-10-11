<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'release_name' => 'required|unique:projects|string|max:25',
            'edition_name' => 'required|unique:projects|string|max:2',
            'print_edition' => 'required|unique:projects',
            'pages_redaction' => 'required|unique:projects',
            'pages_adverts' => 'required|unique:projects',
            'pages_adverts' => 'required|unique:projects',
            'paper_type_cover' => 'required|unique:projects',
            'paper_type_interior' => 'required|unique:projects',
            'color_cover' => 'required|unique:projects',
            'color_interior' => 'required|unique:projects',
            'ledger' => 'required|unique:projects',
            'journal' => 'required|unique:projects',
            'department' => 'required|unique:projects',
            'year' => 'required|unique:projects',
            'revenue_goals' => 'required|unique:projects',
            'comments' => 'required|unique:projects',
        ];
    }
}
