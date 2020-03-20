<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillabel = ['title', 'detail', 'pic'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * タグでフィルタリング
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string|null $tag
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePictureFilter($query, ?string $picture)
    {
        if(!is_null($picture)) {
            return $query->where('picture', $picture);
        }
        return $query;
    }
}
