<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
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
            "name"=>"required|min:3",
            "link"=>"required|min:3",
        ];
    }

    public function messages(): array
    {
        return[
            "name.required"=>"Name must be entered!",
            "name.min"=>"Must enter a name of at least 3 characters!",
            "link.required"=>"Link must be entered!",
            "link.min"=>"Must enter a link of at least 3 characters!",
        ];
    }
}
