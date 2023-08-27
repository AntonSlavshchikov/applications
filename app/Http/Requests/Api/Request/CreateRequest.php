<?php

namespace App\Http\Requests\Api\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|min:10'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Required field!',
            'name.string' => 'The field must be of the type email',
            'email.required' => 'Required field!',
            'email.email' => 'The field must be of the type string!',
            'message.required' => 'Required field!',
            'message.min' => 'Minimum number of characters 10',
        ];
    }
}
