<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            "title" => "required|min:3",
        ];
    }
    public function messages(): array
    {
        return [
            "title.required" => "Name must be entered",
            "title.min" => "Must enter a name of at least 3 characters!",
        ];
    }
}
