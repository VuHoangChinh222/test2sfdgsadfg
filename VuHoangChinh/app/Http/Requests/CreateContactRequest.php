<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "content" => "required|min:3",

        ];
    }
    public function messages(): array
    {
        return [
            //
            "content.required" => "Content must be entered!",
            "content.min" => "Must enter a content of at least 3 characters!",
        ];
    }
}
