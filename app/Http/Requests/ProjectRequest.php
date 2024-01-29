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
            'project_code' => 'required|string',
            'release_name' => 'required|string',
            'edition_name' => 'required|string',
            'print_edition' => 'required',
            'pages_redaction' => 'required',
            'pages_adverts' => 'required',
            'total_pages' => 'required',
            'paper_type_cover' => 'required',
            'paper_type_interior' => 'required',
            'color_cover' => 'required',
            'color_interior' => 'required',
            'ledger' => 'required|integer',
            'journal' => 'required|integer',
            'department' => 'required',
            'year' => 'required',
            'revenue_goals' => 'required|integer',
            'comments' => 'nullable',
            'paper_format' => 'required',
            'layout' => 'required',
            'designer' => 'required',
            'client' => 'required',
            'printer' => 'required',
            'distribution' => 'required',
        ];
    }
}
