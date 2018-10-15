<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Models\Category;

class CategoryComposer
{
    public function compose(View $view) {
        $cates = Category::all();
        $view->with('cates', $cates);
    }
}