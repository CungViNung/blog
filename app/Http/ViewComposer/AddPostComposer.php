<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Models\{Category, Tag};

class AddPostComposer
{
    public function compose(View $view) {
        $categories = Category::all();
        $tags = Tag::all();
        $view->with('categories', $categories)->with('tags', $tags);
    }
}