<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'status',
        'date',
        'del date',
        'price',
        'user_id'
    ];
}
