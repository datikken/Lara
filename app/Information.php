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
        'category', 'urik_title', 'fizik_title', 'urik_text', 'fizik_text'
    ];
}
