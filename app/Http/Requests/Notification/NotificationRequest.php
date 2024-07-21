<?php

namespace App\Http\Requests\Notification;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
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
           'name'      => 'nullable|string',
           'email'     => 'required|string|email',
           'phone'     => 'nullable|string',
           'message'   => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.string'       => 'The name must be a valid string.',
            'email.required'    => 'The email field is required.',
            'email.string'      => 'The email must be a valid string.',
            'email.email'       => 'The email must be a valid email address.',
            'phone.string'      => 'The phone must be a valid string.',
            'message.required'  => 'The message field is required.',
        ];
    }
}
