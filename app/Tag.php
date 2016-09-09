<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
        return $this->morphToMany('App\Post', 'taggable');
    }

    public function videos()
    {
        return $this->morphToMany('App\Video', 'taggable');
    }
}
