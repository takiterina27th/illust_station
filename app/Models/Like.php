<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function like_exist($id, $post_id)
    {
        $exist = Like::where('user_id', '=', $id)->where('post_id', '=', $post_id)->get();

        if (!$exist->isEmpty()) {
            return true;
        } else {
            return false;
        }
    }
}
