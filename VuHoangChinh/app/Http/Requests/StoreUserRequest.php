<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool 
    {
        return true;
    } 

    public function rules(): array
    {
        return [
            'name'=>'required',
            'username'=>'required',
            'email' => 'required|email|unique:user,email|max:255',
            'password' => 'required|min:8',
            'password_re' => 'required|min:8',
        ];
    }
    public function messages(): array{
        return[
            'name.required' => 'Name must be entered!',
            'username.required' => 'User name must be entered!',
            'password.required' => 'Pass must be entered!',
            'password.min' => 'Pass must be have 8 character!',
            'password_re.required' => 'Repassword must be entered!',
            'password_re.min' => 'Repassword must be have 8 character!',
        ];
    } 
}
