<?php

namespace App\Http\Controllers;
use App\DeliveryFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminTrackingController extends Controller
{
    public function index()
    {
        $infos = DeliveryFeedback::all();

        return view('admin.tracking.display',['infos' => $infos]);
    }

    public function collectData(Request $request)
    {

        $theme = $request->input('theme');
        $message = $request->input('message');
        $user_id = Auth::id();

        $exists =  DB::table('orders')->where('user_id', $user_id)->first();

        if($exists) {
            $order_id = DB::table('orders')->where('user_id', $user_id)->value('id');
        } else {
            $order_id = '';
        }

        $arr = array(
            'order_id' => $order_id,
            'user_id' => $user_id,
            'theme' => $theme,
            'message' => $message,
            'created_at' => \Carbon\Carbon::now()
        );

        DB::table('delivery_feedback')->insert($arr);
    }
}
