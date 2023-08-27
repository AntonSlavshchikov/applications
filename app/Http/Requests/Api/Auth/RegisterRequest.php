<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'name' => 'required|min:8|string',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Required field!',
            'name.string' => 'The field must be of the type string!',
            'name.min' => 'Minimum number of characters 8!',
            'email.required' => 'Required field!',
            'email.email' => 'The field must be of the type email!',
            'password.required' => 'Required field!',
            'password.min' => 'Minimum number of characters 8',
            'password.confirmed' => 'Passwords dont match!',
        ];
    }
}
