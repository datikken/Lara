<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainSliderImage extends Model
{
    protected $fillable = [
        'image'
    ];

    public function name()
    {
        $this->image;
    }
}
