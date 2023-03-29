<?php

namespace App\Http\Requests;

use App\Rules\UniqueRanking;
use Illuminate\Foundation\Http\FormRequest;

class RakingCourseRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'courses' => ['bail', 'required', 'array', new UniqueRanking($this->courses)],
            'courses.*.id' => ['bail', 'required', 'integer'],
            'courses.*.ranking' => ['bail', 'required', 'integer'],
        ];


    }

    /**
     * @return array<string, array<string, int|string>>
     */
    public function messages(): array
    {
        return [
            'courses.required' => 'The courses field is required',
            'courses.array' => 'The courses field must be an array',
            'courses.*.id.required' => 'The courses id field is required',
            'courses.*.id.integer' => 'The courses id field must be an integer',
            'courses.*.ranking.required' => 'The courses ranking field is required',
            'courses.*.ranking.integer' => 'The courses ranking field must be an integer',
        ];
    }
}
