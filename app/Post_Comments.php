<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Post_Comments extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'parent_id',
        'likes',
        'dislikes',
        'content',
        'commentable_id',
        'commentable_type'
  ];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Post_Comments::class, 'parent_id');
    }
}
