<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages() {
        return [
            'name.required' => 'Please Enter Name!',
            'email.required' => 'Please Enter Email!',
            'email.email' => 'Please Enter Valid Email!',
            'email.unique' => 'User With This Email Already Exist!',
            'password.required' => 'Please Enter Password!',
            'password.min' => 'Password Strength Is Weak!',
        ];
    }

}
