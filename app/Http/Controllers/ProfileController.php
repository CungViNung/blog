<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post,Category, Tag};
use App\User;
use Validator;
use Auth;

class ProfileController extends Controller
{
    public function profile() {
        return view('frontend.pages.dashboard');
    }

    public function editProfile(Request $request) {
        $rules = [
            'name' => 'min:6|max:20',
            'email'=> 'email',
        ];

        $msg = [
            'name.min' => 'Tên người dùng tối thiểu :min ký tự',
            'name.max' => 'Tên người dùng tối đa :max ký tự',
            'email.email'    => 'Email không đúng định dạng',
        ];

        $validator = Validator::make($request->all(), $rules, $msg);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }else {
            $user = User::find(Auth::user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->description = $request->description;
            if($request->hasFile('img')) {
                $img = $request->img->getClientOriginalName();
                $user->avatar = $img;
                $request->img->move('upload/profile/', $img);
            }
            $user->update();
            return redirect()->route('profile')->with('success', 'Chỉnh sửa thông tin thành công!');
        }
    }
    public function getAddPost() {
        return view('frontend.pages.adduserpost');
    }
    
    public function postAddPost(Request $request) {
        $fileName = $request->img->getClientOriginalName();
        $userPost = new Post;
        $userPost->title = $request->title;
        $userPost->slug = str_slug($request->title);
        $userPost->category_id = $request->category;
        $userPost->description = $request->description;
        $userPost->content = $request->content;
        if(Auth::user()->role == 'admin') {
            $userPost->status = 3;
        }else {
            $userPost->status = 1;
        }     
        $userPost->feature_image = $fileName;
        $userPost->user_id = Auth::user()->id;
        $userPost->save();
        $userPost->tag()->sync($request->tags);
        $request->img->move('upload/post/', $fileName);
        return redirect()->route('profile')->with('success', 'Thêm bài viết thành công, vui lòng đợi quản trị viên phê duyệt');

    }
    public function getEdit($id) {
        $posts = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('frontend.pages.edituserpost', compact('posts', 'categories', 'tags'));
    }
    public function postEdit(Request $request, $id) {
        $posts = Post::find($id);
        $posts->title = $request->title;
        $posts->slug = str_slug($request->title);
        $posts->description = $request->description;
        $posts->category_id = $request->category;
        $posts->content = $request->content;
        $posts->tag()->sync($request->tags);
        if(Auth::user()->role == 'admin') {
            $posts->status = 3;
        }else {
            $posts->status = 1;
        }    
        if($request->hasFile('img')) {
            $img = $request->img->getClientOriginalName();
            $posts->feature_image = $img;
            $request->img->move('upload/post/', $img);
        }
        $posts->save();
        return redirect()->route('profile')->with('success', 'Sửa bài viết thành công, vui lòng đợi quản trị viên phê duyệt');
    }

    public function getDelete($id) {
        $posts = Post::find($id);   
        $posts::destroy($id);
        return redirect()->route('profile')->with('Xóa bài viết thành công');
    }
}
