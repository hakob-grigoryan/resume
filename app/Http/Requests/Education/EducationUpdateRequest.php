<?php

namespace App\Http\Requests\Education;

use Illuminate\Foundation\Http\FormRequest;

class EducationUpdateRequest extends FormRequest
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
            'id' => 'required|integer|exists:education,id',
            'name'=> 'required',
            'description'=>'required'
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'An ID is required.',
            'id.integer' => 'The ID must be an integer.',
            'id.exists' => 'The selected ID does not exist in the education table.',
            'name.required' => 'Name is required.',
            'name.string' => 'Name section must be a string.',
            'description.required' => 'A description is required.',
            'description.string' => 'Description section must be a string.',
        ];
    }
}
