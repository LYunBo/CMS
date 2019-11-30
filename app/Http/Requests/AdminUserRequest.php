<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
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
            'username' => 'required',
            'password' => 'required|confirmed',
            'code' => 'required'
        ];
    }

    public function message()
    {
        return [
            'username.required' => '用户名不能为空',
            'password.required' => '密码不能为空',
            'code.required' => '验证码不能为空',
            'code.captcha' => '验证码不正确'
        ];
    }
}
