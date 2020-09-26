<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post_Comments;
use Illuminate\Support\Facades\URL;

class Post extends Model
{
    protected $guarded = [];
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
        return $this->morphMany(Post_Comments::class, 'commentable')->whereNull('parent_id');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function id()
    {
        return $this->id;
    }

    public function url()
    {
        $id = $this->id;
        URL::to('/blog/' . $id);
    }
}
