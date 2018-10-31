<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post, Category, Tag, Comment};
use App\Repositories\{PostRepository, CateRepository, AuthorRepository};
use App\User;

class TestController extends Controller
{
    
    public function testt() {
        $test = $this->authorRepository->find(27);
        $author = $test->name;
        dd($author);
    }
}
