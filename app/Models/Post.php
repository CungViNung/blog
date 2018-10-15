<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';

    public function category() {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function users() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function tag() {
        return $this->belongsToMany('App\Models\Tag', 'post_tag', 'post_id', 'tag_id');
    }

    public function comment() {
        return $this->hasMany('App\Models\Comment', 'post_id');
    }

}
