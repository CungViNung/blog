<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post, Category, Tag, Comment};
use App\User;
use Auth;
use Session;

class FrontendController extends Controller
{   
    public function getIndex() {
        $posts = Post::where('status', 3)->get();
        $cate = Category::all();
        return view('frontend.pages.index', compact('posts', 'cate'));
    }

    public function getCate($id) {
        $cates = Category::find($id);
        $posts_cate = Post::where('category_id', $id)->orderBy('id', 'desc')->paginate(6);
        return view('frontend.pages.category', compact('cates', 'posts_cate'));
    }

    public function getPostDetail($id) {
        $posts = Post::find($id);

        $postView = 'post_' . $id;
        // Check if blog session key exists
        // If not, update view_count and create session key
        if (!Session::has($postView)) {
            Post::where('id', $id)->increment('view');
            Session::put($postView, 1);
        }

        $related = Post::where('category_id', $posts->category_id)->orderBy('id', 'desc')->take(3)->get();
        $comments = Comment::where('post_id', $id)->orderBy('id', 'desc')->paginate(10);
        return view('frontend.pages.blog-post', compact('posts', 'comments', 'related'));
    }

    public function postComment(Request $request, $id) {
        $comment = new Comment;
        $comment->com_email = Auth::user()->email;
        $comment->com_name = Auth::user()->name;
        $comment->com_content = $request->message;
        $comment->post_id = $id;
        $comment->user_id = Auth::user()->id;   
        $comment->save();
        return back();
    }

    public function getAuthor($id) {
        $author = User::find($id);
        $author_post = Post::where('status', 3)->where('user_id', $id)->orderBy('created_at', 'desc')->paginate(2);
        return view('frontend.pages.author', compact('author', 'author_post'));
    }
    public function getContact() {
        return view('frontend.pages.contact');
    }
    
}
