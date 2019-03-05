<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest {

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
            'postTitle' => 'required',
            'websiteId' => 'required',
            'categoryId' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages() {
        return [
            'postTitle.required' => 'Please Enter Post Title!',
            'websiteId.required' => 'Please Select Website!',
            'categoryId.required' => 'Please Select Category!'
        ];
    }

}
