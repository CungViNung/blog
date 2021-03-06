<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'id';
    protected $fillable = ['com_email', 'com_name', 'com_content', 'post_id', 'user_id'];

    public function post() {
        return $this->belongsTo('App\Models\Post', 'post_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
