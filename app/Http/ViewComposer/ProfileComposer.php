<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Models\Post;
use Auth;

class ProfileComposer
{
    public function compose(View $view) {
        $posts = Post::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->paginate(5);
        $view->with('posts', $posts);
    }
}