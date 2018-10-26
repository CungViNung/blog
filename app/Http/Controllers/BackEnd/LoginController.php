<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function getLogin() {
        return view('backend.login');
    }

    public function postLogin(LoginRequest $request) {
        $admin = ['email'=>$request->email, 'password'=>$request->password, 'role'=>'admin'];
        $author = ['email'=>$request->email, 'password'=>$request->password, 'role'=>'author'];
        if($request->rememeber = 'Remember Me') {
            $remember = true;
        }else {
            $remember = false;
        }
        if(Auth::attempt($admin, $remember)) {
            return redirect()->route('admin-panel');
        }elseif(Auth::attempt($author, $remember)) {
            return redirect()->route('index');
        }
        else {
            return back()->with('error', trans('messages.login.'));
        }
    }
}
