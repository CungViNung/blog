<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ];
    }

    public function messages() {
        return [
            'email.required' => 'Email không được để trống',
            'email.email'    => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min'  => 'Mật khẩu tối thiểu :min ký tự',
            'password.max'  => 'Mật khẩu tối đa :max ký tự'
        ];
    }
}
