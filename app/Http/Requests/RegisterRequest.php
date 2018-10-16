<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:6|max:20',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'password_confirm' => 'required|confirmed|min:6'
        ];
    }
    public function messages() {
        return [
            'name.required' => 'Tên người dùng không được để trống',
            'name.min' => 'Tên người dùng tối thiểu :min ký tự',
            'name.max' => 'Tên người dùng tối đa :max ký tự',
            'email.required' => 'Email không được để trống',
            'email.email'    => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min'  => 'Mật khẩu tối thiểu :min ký tự',
        ];
    }
}
