<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post, Category, Tag, Comment};
use App\Repositories\{PostRepository, CateRepository};

class TestController extends Controller
{
    protected $postRepository;
    protected $cateRepository;

	public function __construct(PostRepository $postRepository, CateRepository $cateRepository) {
		$this->postRepository = $postRepository;
		$this->cateRepository = $cateRepository;
	}
    // public function test() {
    //     $post = $this->postRepository->all();
        
    // }
    public function testt() {
    	$cate = $this->cateRepository->all();
    	dd($cate);
    }
}
