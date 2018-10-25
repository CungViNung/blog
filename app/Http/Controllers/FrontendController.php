<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class FrontendController extends Controller
{   
    public function getIndex() {
        $posts = $this->postRepository->findByField('status', '3');
        $cate = $this->cateRepository->all();
        return view('frontend.pages.index', compact('posts', 'cate'));
    }

    public function getCate($id) {
        $cates = $this->cateRepository->find($id);
        $posts_cate = $this->postRepository->getPostCate($id);
        return view('frontend.pages.category', compact('cates', 'posts_cate'));
    }

    public function getPostDetail($id) {
        $posts = $this->postRepository->find($id);

        $postView = 'post_' . $id;
        // Check if blog session key exists
        // If not, update view_count and create session key
        if (!Session::has($postView)) {
            Post::where('id', $id)->increment('view');
            Session::put($postView, 1);
        }

        $related = $this->postRepository->getRelated($id)->get();
        $comments = $this->commentRepository->postComment($id);
        return view('frontend.pages.blog-post', compact('posts', 'comments', 'related'));
    }

    public function postComment(Request $request, $id) {
        $data = [
            'com_email' => Auth::user()->email,
            'com_name' => Auth::user()->name,
            'com_content' => $request->message,
            'post_id' => $id,
            'user_id' => Auth::user()->id,
        ];
        $cmt = $this->commentRepository->create($data);
        return back();
    }

    public function getAuthor($id) {
        $author = $this->authorRepository->find($id);
        $author_post = $this->postRepository->authorPost($id);
        return view('frontend.pages.author', compact('author', 'author_post'));
    }
    public function getContact() {
        return view('frontend.pages.contact');
    }
    
}
