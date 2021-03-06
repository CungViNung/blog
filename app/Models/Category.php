<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';

    public function posts() {
        return $this->hasMany('App\Models\Post', 'category_id', 'id');
    }

    public function child() {
        return $this->hasMany('App\Models\Category', 'parent');
    }
}
