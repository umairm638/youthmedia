<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest {

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
            'categoryId' => 'required',
            'uploadVideo' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages() {
        return [
            'postTitle.required' => 'Please Add Video Title!',
            'categoryId.required' => 'Please Select Category!',
            'uploadVideo.required' => 'Please Upload mp4 Video File!'
        ];
    }

}
