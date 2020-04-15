<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category', 'type', 'title', 'text'
    ];
}
