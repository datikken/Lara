<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DeliveryController extends Controller
{
    public function getLastDeliveryAdress()
    {
        $userId = Auth::id();


        $lastOrder = DB::table('orders')->where('user_id', $userId)->latest('id')->first();

        dump($lastOrder);
    }
}
