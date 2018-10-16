<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Models\{Category, Post};

class MenuComposer
{
    public function compose(View $view) {
        $cates = Category::whereIn('id', [4, 12, 13, 14])->get();
        $acate = Category::whereIn('id', [15, 16, 8])->get();
        $view->with('cates', $cates)->with('acate', $acate);
    }
}