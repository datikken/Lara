<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Image extends Model
{
    protected $fillable = [
      'image'
    ];

    public function images()
    {
        return $this->belongsToMany(Product::class);
    }
}
