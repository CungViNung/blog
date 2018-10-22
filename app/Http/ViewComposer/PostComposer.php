<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Models\Post;

class PostComposer
{
    public function compose(View $view) {
        $posts = Post::where('status', 3)->where('view', '>=', 3)->orderBy('view', 'desc')->limit(4)->get();
        $view->with('posts', $posts);
    }
}