<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'rePassword' => 'required|min:8',
            'phone'=>'required|min:10'
        ];
    }
    public function messages(): array{
        return[
            'name.required' => 'Name must be entered!',
            'username.required' => 'User name must be entered!',
            'password.required' => 'Pass must be entered!',
            'password.min' => 'Pass must be have 8 character!',
            'rePassword.required' => 'Repassword must be entered!',
            'rePassword.min' => 'Repassword must be have 8 character!',
            'phone.required' => 'Phone must be entered!',
            'phone.min' => 'Phone must be have 10 character!',
        ];
    } 
}
