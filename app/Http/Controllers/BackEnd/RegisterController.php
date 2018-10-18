<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;

class RegisterController extends Controller
{
    public function getRegister() {
        return view('backend.register');
    }

    public function postRegister(Request $request) {
        $rule = [
            'name' => 'required|min:6|max:20',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];
        $msg = [
            'name.required' => 'Tên người dùng không được để trống',
            'name.min' => 'Tên người dùng tối thiểu :min ký tự',
            'name.max' => 'Tên người dùng tối đa :max ký tự',
            'email.required' => 'Email không được để trống',
            'email.email'    => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min'  => 'Mật khẩu tối thiểu :min ký tự',
            'password.confirmed' => 'Mật khẩu không khớp',
        ];
        $validator = Validator::make($request->all(), $rule, $msg);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }else {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->avatar = 'df.png';
            $user->save();
            return redirect()->route('profile');
        }
        
    }
}
