<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'      => 'required',
            'surname'      => 'required|string',
            'email'     => 'required|string|email',
            'password'     => 'required|string',
            'confirm-password'   => 'required|same:password',
        ];
    }

    public function messages(): array
    {
        return [
        'name.required' => 'Name section cannot be empty.',
        'name.string' => 'Name section must be a string.',
        'surname.required' => 'Surname section cannot be empty.',
        'surname.string' => 'Surname section must be a string.',
        'email.required' => 'Email section cannot be empty.',
        'email.email' => 'Email section must contain a valid email address.',
        'password.required' => 'Password section cannot be empty.',
        'password.string' => 'Password section must be a string.',
        'confirm-password.required' => 'Confirm Password section cannot be empty.',
        'confirm-password.same' => 'Confirm Password must match the Password.'
        ];
    }

}
