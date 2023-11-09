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
            'project_code' => 'required|unique:projects|string|max:10',
            'release_name' => 'required|unique:projects|string|max:25',
            'edition_name' => 'required|unique:projects|string|max:2',
            'print_edition' => 'required|unique:projects',
            'pages_redaction' => 'required',
            'pages_adverts' => 'required',
            'total_pages' => 'required',
            'paper_type_cover' => 'required',
            'paper_type_interior' => 'required',
            'color_cover' => 'required',
            'color_interior' => 'required',
            'ledger' => 'required',
            'journal' => 'required',
            'department' => 'required',
            'year' => 'required',
            'revenue_goals' => 'required',
            'comments' => 'nullable',
            'format' => 'required',
            'layout' => 'required',
            'designer' => 'required',
            'client' => 'required',
            'printer' => 'required',
            'distribution' => 'required',
        ];
    }
}
