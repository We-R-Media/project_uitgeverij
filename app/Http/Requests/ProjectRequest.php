<?php

namespace App\Http\Requests;

use App\AppHelpers\MoneyHelper;
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
            'name' => 'required|string',
            'designer' => 'nullable|string',
            'printer' => 'nullable|string',
            'client' => 'nullable|string',
            'distribution' => 'nullable|string',
            'release_name' => 'required|string',
            'edition_name' => 'required|string',
            'edition_amount' => 'nullable|integer',
            'paper_format' => 'nullable|string',
            'pages_adverts' => 'nullable|integer',
            'pages_redaction' => 'nullable|integer',
            'paper_type_cover' => 'nullable|string',
            'paper_type_interior' => 'nullable|string',
            'color_cover' => 'nullable|string',
            'color_interior' => 'nullable|string',
            'ledger' => 'nullable|integer',
            'journal' => 'nullable|integer',
            'pages_total' => 'nullable',
            'paper_format' => 'nullable|string',
            'cost_place' => 'nullable|integer',
            'comments' => 'nullable|string|max:255',
            // 'layout' => 'nullable',
            'revenue_goals' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    $numericValue = MoneyHelper::convertToNumeric($value);

                    if (!is_numeric($numericValue)) {
                        $fail('The '.$attribute.' must be a valid numeric value.');
                    }
                },
            ]
        ];
    }
}
