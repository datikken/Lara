<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Post_Comments extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'content',
        'likes',
        'dislikes'
    ];

    public function comments()
    {
        return $this->belongsToMany(Post::class);
    }
}
