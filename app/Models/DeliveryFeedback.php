<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryFeedback extends Model
{
    protected $fillable = [
        'id','order_id', 'user_id', 'theme', 'message', 'create_at'
    ];
}
