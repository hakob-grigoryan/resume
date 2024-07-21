<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class SettingsUpdateRequest extends FormRequest
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
              'id' => 'required|integer|exists:settings,id',
              'tab_1' => 'nullable',
              'tab_2' => 'nullable',
              'tab_3' => 'nullable',
              'tab_4' => 'nullable',
              'facebook' => 'nullable',
              'instagram' => 'nullable',
              'twitter' => 'nullable',
              'linkedin' => 'nullable',
              'map_link' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
               'id.required' => 'An ID is required.',
               'id.integer' => 'The ID must be an integer.',
               'id.exists' => 'The selected ID does not exist in the posts table.',
               'tab_1.nullable' => 'Tab 1 is optional.',
               'tab_2.nullable' => 'Tab 2 is optional.',
               'tab_3.nullable' => 'Tab 3 is optional.',
               'tab_4.nullable' => 'Tab 4 is optional.',
               'facebook.nullable' => 'Facebook link is optional.',
               'instagram.nullable' => 'Instagram link is optional.',
               'twitter.nullable' => 'Twitter link is optional.',
               'linkedin.nullable' => 'LinkedIn link is optional.',
               'map_link.nullable' => 'Map link is optional.',
        ];
    }
}
