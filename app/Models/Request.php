<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    public function toUser() {
        return $this->belongsTo('App\User', 'to_user_id');
    }
    public function fromUser() {
        return $this->belongsTo('App\User', 'from_user_id');
    }
}
