<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class CateRepository extends BaseRepository {

	function model() {
		return "App\Models\Category";
	}

}