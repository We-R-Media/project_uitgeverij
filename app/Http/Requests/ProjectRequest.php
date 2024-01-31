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
            'release_name' => 'required|string',
            'edition_name' => 'required|string',
            'print_edition' => 'required|string',
            'pages_total' => 'required',
            'paper_format' => 'required',
            'cost_place' => 'required',
            'layout' => 'required',
            'revenue_goals' => [
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
