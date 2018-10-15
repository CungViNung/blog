<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Post;

class UserController extends Controller
{
    public function getUser() {
        $users = User::paginate(10);
        return view('backend.user', compact('users', 'post'));
    }

    public function getAddUser() {
        return view('backend.adduser');
    }

    public function postAddUser(Request $request) {
        $fileName = $request->img->getClientOriginalName();
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->avatar = $fileName;  
        $user->password = bcrypt($request->password);
        $user->description = $request->description;
        $user->role = $request->role;
        $user->save();
        $request->img->move('upload/profile/', $fileName);
        return redirect()->route('user-panel')->with('success', 'Thêm tài khoản thành công');
    }  
        
    public function userDetail($id) {
        $user = User::find($id);
        $posts = Post::where('user_id', $id)->get();
        return view('backend.profile', compact('user', 'posts'));
    }

    public function editUser(Request $request, $id) {
        $user = User::find($id);
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
        return redirect()->route('user-panel')->with('success', 'Chỉnh sửa tài khoản thành công!');
    }

    public function deleteUser($id) {
        User::destroy($id);
        return redirect()->route('user-panel')->with('success', 'Xóa tài khoản thành công');
    }
}
