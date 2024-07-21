<?php

namespace App\Http\Requests\Skill;

use Illuminate\Foundation\Http\FormRequest;

class SkillUpdateRequest extends FormRequest
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
            'id' => 'required|integer|exists:skills,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'=> 'required',
            'description' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'An ID is required.',
            'id.integer' => 'The ID must be an integer.',
            'id.exists' => 'The selected ID does not exist in the skills table.',
            'image.required' => 'An image is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image size must not exceed 2048 kilobytes.',
            'description.required' => 'Description is required.',
            'name.required' => 'A name is required.',
        ];
    }
}
