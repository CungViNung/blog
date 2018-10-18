<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Models\{Post, Category};


class HomeController extends Controller
{
    public function getDashboard() {
        $post = Post::orderBy('id', 'desc')->get();
        $cate = Category::all();
        $user = User::all();
        return view('backend.index', compact('post', 'cate', 'user'));
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
