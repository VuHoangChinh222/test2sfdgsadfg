<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
            // 'name'=>'required|min:6',
            // 'link'=>'required',
            // 'description'=>'required',
        ];
    }
    public function messages(): array{
        return[
            // 'name.required' => 'Brand must be entered!',
            // 'name.min' => 'Must enter a name of at least 6 characters!',
            // 'link.required' => 'Link must be entered!',
            // 'description.required' => 'Description must be entered!',
        ];
    } 
}
