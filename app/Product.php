<?php

namespace App;

use App\Product_Image;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use FullTextSearch;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'image', 'price', 'type'
    ];

    protected $searchable = [
        'name', 'description', 'artikul', 'name_buh', 'params', 'cape', 'photo'
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
