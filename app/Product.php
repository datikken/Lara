<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product_Image;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'image', 'price', 'type'
    ];

    public function getPriceAttribute($value)
    {
        $newForm = "$" . $value;

        return $value;
    }

    public function images()
    {
        return $this->belongsToMany(Product_Image::class);
    }
}
