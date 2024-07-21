<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
            'email'     => 'required|string|email',
            'password'     => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
        'email.required' => 'Email section cannot be empty.',
        'email.email' => 'Email section must contain a valid email address.',
        'password.required' => 'Password section cannot be empty.',
        'password.string' => 'Password section must be a string.',
        ];
    }
}
