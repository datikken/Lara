<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainSliderImages extends Model
{
    protected $fillable = [
        'image'
    ];

    public function name()
    {
        $this->image;
    }
}
