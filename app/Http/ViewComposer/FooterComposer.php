<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Models\{Category, Tag};

class FooterComposer
{
    public function compose(View $view) {
        $cates = Category::whereIn('id', [4, 14, 12, 13])->get();
        $tags = Tag::all();
        $view->with('cates', $cates)->with('tags', $tags);
    }
}