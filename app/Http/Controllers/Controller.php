<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\{PostRepository, CateRepository, CommentRepository, AuthorRepository, TagRepository};

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	protected $postRepository;
	protected $cateRepository;
	protected $commentRepository;
	protected $authorRepository;
	protected $tagRepository;

	public function __construct(PostRepository $postRepository, CateRepository $cateRepository, CommentRepository $commentRepository, AuthorRepository $authorRepository, TagRepository $tagRepository) {
		$this->postRepository = $postRepository;
		$this->cateRepository = $cateRepository;
		$this->commentRepository = $commentRepository;
		$this->authorRepository = $authorRepository;
		$this->tagRepository = $tagRepository;
	}

}
