<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class CommentRepository extends BaseRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return "App\\Models\\Comment";
    }

    public function postComment($id) {
        $result = $this->model->where('post_id', $id)->orderBy('id', 'desc')->get();
        return $result;
    }
}