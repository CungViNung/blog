<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Requests\AddPostRequest;
use App\Http\Controllers\Controller;
use App\Models\{Post, Category, Tag};
use Auth;

class PostController extends Controller
{
    public function listPost() {
        $posts = Post::orderBy('id', 'desc')->paginate(20);
        return view('backend.postlist', compact('posts'));
    }

    public function getAddPost() {
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.addpost', compact('categories', 'tags'));
    }

    public function postAddPost(AddPostRequest $request) {
        $fileName = $request->feature->getClientOriginalName();
        $post = new Post;
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->content = $request->content;
        $post->description = $request->description;
        $post->feature_image = $fileName;
        $post->hot = $request->hot;
        if(Auth::user()->role == 'admin') {
            $post->status = 3;
        }else {
            $post->status = 1;
        }
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category;
        $post->save();
        $post->tag()->sync($request->input('tags'));
        $request->feature->move('upload/post/', $fileName);
        return redirect()->route('post-panel')->with('success', 'Thêm bài viết thành công!');
    }

    public function getEditPost($id) {
        $posts = Post::find($id);
        $category = Category::all();
        $tags = Tag::all();
        return view('backend.editpost', compact('posts', 'category', 'tags'));
    }

    public function postEditPost(Request $request, $id) {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->description = $request->description;
        $post->category_id = $request->category;
        $post->content = $request->content;
        $post->tag()->sync($request->tags);
        if($request->hasFile('img')) {
            $img = $request->img->getClientOriginalName();
            $post->feature_image = $img;
            $request->img->move('upload/post/', $img);
        }
        $post->status = $request->status;
        $post->hot = $request->hot;
        $post->save();
        return redirect()->route('post-panel')->with('success', 'Sửa bài viết thành công!');
    }

    public function getDeletePost($id) {
        Post::destroy($id);
        return redirect()->route('post-panel')->with('success', 'Xóa bài viết thành công!');
    }
}
