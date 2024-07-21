<?php

namespace App\Http\Requests\ImageFlow;

use Illuminate\Foundation\Http\FormRequest;

class ImageFlowDeleteRequest extends FormRequest
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
             'id' => 'required|integer|exists:image_flows,id',
        ];
    }

    public function messages(): array
    {
        return [
              'id.required' => 'An ID is required.',
              'id.integer' => 'The ID must be an integer.',
              'id.exists' => 'The selected ID does not exist in the ImageFlow table.',
        ];
    }
}
