<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
