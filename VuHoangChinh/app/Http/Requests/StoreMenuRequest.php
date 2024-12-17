<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
            // "custom_name"=>"required|min:3",
            // "custom_link"=>"required|min:3",
        ];
    }

    public function messages(): array
    {
        return[
            // "custom_name.required"=>"Name must be entered!",
            // "custom_name.min"=>"Must enter a name of at least 3 characters!",
            // "custom_link.required"=>"Link must be entered!",
            // "custom_link.min"=>"Must enter a link of at least 3 characters!",
        ];
    }
}
