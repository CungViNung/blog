<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";
    protected $primaryKey = "id";

    public function post() {
        return $this->belongsToMany('App\Models\Post', 'post_tag', 'post_id', 'tag_id');
    }
}
