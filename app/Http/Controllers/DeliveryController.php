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
        if(isset($lastOrder)) {
            $param = json_decode($lastOrder->order_info);

            if(!is_null($param->adress)) {
                return response()->json($lastOrder);
            } else {
                return null;
            }
        }
    }
}
