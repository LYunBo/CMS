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
            'username' => 'require',
            'password' => 'require|confirmed',
            'code' => 'require|captcha'
        ];
    }

    public function message()
    {
        return [
            'username.require' => '用户名不能为空',
            'password.require' => '密码不能为空',
            'code.require' => '验证码不能为空',
            'code.captcha' => '验证码不正确'
        ];
    }
}
