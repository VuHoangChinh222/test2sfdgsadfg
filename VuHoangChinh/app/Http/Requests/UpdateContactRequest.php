<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            "name"=>"required",
            "email"=>"required",
            "phone"=>"required",
        ];
    }
    public function messages(): array{
        return[
            "name.required"=>"Name must be entered!",
            "email.required"=>"Email must be entered!",
            "phone.required"=>"Phone must be entered!",

        ];
    }
}
