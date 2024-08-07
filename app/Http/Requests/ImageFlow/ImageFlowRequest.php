<?php

namespace App\Http\Requests\ImageFlow;

use Illuminate\Foundation\Http\FormRequest;

class ImageFlowRequest extends FormRequest
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
             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
              'image.required' => 'An image is required.',
              'image.image' => 'The file must be an image.',
              'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
              'image.max' => 'The image size must not exceed 2048 kilobytes.',
        ];
    }
}
