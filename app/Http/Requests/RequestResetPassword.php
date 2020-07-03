<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestResetPassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|min:6|max:32',
            'password_confirm' => 'required|same:password|min:6|max:32',
        ];

    }
    public function messages(){
        return[
            'password.required' =>'Trường này không được để trống',
            'password.min' =>'Password ít nhất 6 ký tự',
            'password.max' =>'Password nhiều nhất 32 ký tự',

            'password_confirm.required' =>'Trường này không được để trống',
            'password_confirm.same' =>'Mật khẩu không giống nhau',
            'password_confirm.min' =>'Password ít nhất 6 ký tự',
            'password_confirm.max' =>'Password nhiều nhất 32 ký tự',
        ];
    }
}
