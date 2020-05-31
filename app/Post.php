<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post_Comments;

class Post extends Model
{
    protected $fillable = [
        'category',
        'heading',
        'shortDesc',
        'author',
        'created_at',
        'updated_at',
        'content'
    ];

    public function comments()
    {
        return $this->belongsToMany(Post_Comments::class);
    }
}
