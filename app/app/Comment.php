<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'picture_id', 'msg'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function picture()
    {
        return $this->hasOne('App\Picture');
    }
    
}

