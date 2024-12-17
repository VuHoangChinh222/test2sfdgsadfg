<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|max:16',
            'category_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required|numeric',
            'qty' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return[
            'name.required' => 'Name must be entered!',
            'name.max' => 'Must enter a name of at most 16 characters!',
            'category_id.required' => 'Category must be choice!',
            'brand_id.required' => 'Brand must be choice!',
            'price.required' => 'Price must be entered!',
            'price.numeric' => 'Price must be number!',
            'qty.required' => 'Quantity must be entered!',
            'qty.integer' => 'Quantity must be integer!',
            'image.required' => 'Product must be have image!',
            'image.image' => 'File must be image!',
            'image.mimes' => 'Image type: jpeg, png, jpg, gif, or webp!',
            'image.max' => 'Image must be have most 2048 KB!',
        ];
    }
}
