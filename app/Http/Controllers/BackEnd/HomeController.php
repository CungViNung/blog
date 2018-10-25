<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{
    public function index() {
        $post = $this->postRepository->all();
        $cate = $this->cateRepository->all();
        $user = $this->authorRepository->all();
        return view('backend.index', compact('post', 'cate', 'user'));
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
