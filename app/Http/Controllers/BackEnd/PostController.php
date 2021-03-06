<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Requests\AddPostRequest;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = $this->postRepository->listPost();
        return view('backend.postlist', compact('posts'));
    }

    public function create() {
        $categories = $this->cateRepository->all();
        $tags = $this->tagRepository->all();
        return view('backend.addpost', compact('categories', 'tags'));
    }

    public function store(AddPostRequest $request) {
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
        return redirect()->route('post-panel')->with('success', trans('messages.post.'));
    }

    public function edit($id) {
        $posts = $this->postRepository->find($id);
        $category = $this->cateRepository->all();
        $tags = $this->tagRepository->all();
        return view('backend.editpost', compact('posts', 'category', 'tags'));
    }

    public function update(Request $request, $id) {
        $post = $this->postRepository->find($id);
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
        return redirect()->route('post-panel')->with('success', trans('messages.post.'));
    }

    public function delete($id) {
        $this->postRepository->delete($id);
        return redirect()->route('post-panel')->with('success', trans('messages.post.'));
    }
}
