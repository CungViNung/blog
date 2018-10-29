<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class UserController extends Controller
{
    public function index() {
        if(Auth::user()->can('Permission.view')) {
            $users = $this->authorRepository->all();
            return view('backend.user', compact('users'));
        }
        return redirect()->route('admin-panel');
    }

    public function create() {
        if(Auth::user()->can('Permission.create')) {
            return view('backend.adduser');
        }
        return redirect()->route('admin-panel');
    }

    public function store(Request $request) {
        $user = new User;
        if($request->hasFile('img')) {
            $fileName = $request->img->getClientOriginalName();
            $request->img->move('upload/profile/', $fileName);
        } else {
            $fileName = 'df.png';
        }
        $user->name = $request->name;
        $user->avatar = $fileName;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->description = $request->description;
        $user->role = $request->role;
        $user->save();
        return redirect()->route('user-panel')->with('success', trans('messages.user.store'));
    }  
        
    public function edit($id) { 
        if(Auth::user()->can('Permission.view')) {
            $user = $this->authorRepository->find($id);
            return view('backend.profile', compact('user'));
        }
        return redirect()->route('admin-panel');
    }

    public function update(Request $request, $id) {
        $user = $this->authorRepository->find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->description = $request->description;
        $user->role = $request->role;
        if($request->hasFile('img')) {
            $img = $request->img->getClientOriginalName();
            $user->avatar = $img;
            $request->img->move('upload/profile/', $img);
        }
        $user->save();
        return redirect()->route('user-panel')->with('success', trans('messages.user.update'));
    }

    public function delete($id) {
        $this->authorRepository->delete($id);
        return redirect()->route('user-panel')->with('success', trans('messages.user.delete'));
    }
}
