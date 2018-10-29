<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class PostRepository extends BaseRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return "App\\Models\\Post";
    }

    public function getPostCate($id) {
		$result = $this->model->where('category_id', $id)->where('status', 4)->paginate();
		return $result;
	}

	public function getRelated($id) {
		$result = $this->model->where('status', 4)->take(3);
		return $result;
	}

    public function authorPost($id) {
        $result = $this->model->where('status', 4)->where('user_id', $id)->orderBy('created_at', 'desc')
        ->paginate();
        return $result;
    }

    public function listPost() {
        $result = $this->model->orderBy('id', 'desc')->paginate();
        return $result;
    }
}