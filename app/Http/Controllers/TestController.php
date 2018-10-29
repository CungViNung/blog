<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post, Category, Tag, Comment};
use App\Repositories\{PostRepository, CateRepository};
use App\User;

class TestController extends Controller
{
    
    public function testt(User $user) {
        $test = $user->get();
        dd($test);
    }
}
