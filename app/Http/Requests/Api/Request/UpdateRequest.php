<?php

namespace App\Http\Requests\Api\Request;

use App\Models\Enums\Request\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UpdateRequest extends FormRequest
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
            'status' => 'required',
            'comment' => 'required_if:status,===,Resolved'
        ];
    }

    public function messages()
    {
        return [
            'status.required' => 'Required field!',
            'comment.required_if' => 'Add comment!',
        ];
    }
}
