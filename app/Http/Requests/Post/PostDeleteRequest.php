<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostDeleteRequest extends FormRequest
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
            'id' => 'required|integer|exists:posts,id',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'An ID is required.',
            'id.integer' => 'The ID must be an integer.',
            'id.exists' => 'The selected ID does not exist in the posts table.',
        ];
    }
}
