<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index() {
        $users = $this->authorRepository->all();
        return view('backend.user', compact('users'));
    }

    public function create() {
        return view('backend.adduser');
    }

    public function store(Request $request) {
        $fileName = $request->img->getClientOriginalName();
        $user = new User;
        $user->name = $request->name;
        $user->avatar = $fileName;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->description = $request->description;
        $user->role = $request->role;
        $user->save();
        $request->img->move('upload/profile/', $fileName);
        return redirect()->route('user-panel')->with('success', trans('messages.user.'));
    }  
        
    public function edit($id) { 
        $user = $this->authorRepository->find($id);
        return view('backend.profile', compact('user'));
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
        return redirect()->route('user-panel')->with('success', trans('messages.user.'));
    }

    public function delete($id) {
        $this->authorRepository->delete($id);
        return redirect()->route('user-panel')->with('success', trans('messages.user.'));
    }
}
