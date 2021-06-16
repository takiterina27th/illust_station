<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Models\Tag', 'post_tags'); 
    }
}
