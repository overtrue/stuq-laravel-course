<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'category_id', 'cover', 'author', 'content'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
