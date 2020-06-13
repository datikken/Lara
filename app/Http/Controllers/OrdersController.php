<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public static function ordersHistory()
    {
        $user_id = Auth::id();
        $type = DB::table('users')->where('id', $user_id)->select('face','email', 'name')->first();
        $orders_history = DB::table('orders')->where('user_id', $user_id)->where('status', 'arrived')->get();

        if(DB::table('orders')->where('user_id', $user_id)->where('status','arrived')->get()->last()) {
            $last_order_id = DB::table('orders')->where('user_id', $user_id)->where('status', 'arrived')->get()->last()->id;
            $last_order = DB::table('order_items')->where('order_id', $last_order_id)->get();
            $last_order_total = DB::table('orders')->where('id', $last_order_id)->where('status', 'arrived')->get();
            $last_order->id = $last_order_id;

            return $arr = array(
                'orders_history' => $orders_history,
                'user' => $type,
                'last_order' => $last_order,
                'last_order_total' => $last_order_total
            );

        } else {
            return null;
        }
    }
}
