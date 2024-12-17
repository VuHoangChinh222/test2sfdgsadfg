<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            "delivery_name"=>"required|min:3",
            "delivery_email"=>"required|min:3",
            "delivery_phone"=>"required|min:10",
            "delivery_address"=>"required|min:3",
        ];
    }

    public function messages(): array
    {
        return[
            "delivery_name.required"=>"Name must be entered!",
            "delivery_name.min"=>"Must enter a name of at least 3 characters!",
            "delivery_email.required"=>"Price must be entered!",
            "delivery_email.min"=>"Must enter a price of at least 3 characters!",
            "delivery_phone.required"=>"Price must be entered!",
            "delivery_phone.min"=>"Must enter a price of at least 10 characters!",
            "delivery_address.required"=>"Price must be entered!",
            "delivery_address.min"=>"Must enter a price of at least 3 characters!",
        ];
    }
}
