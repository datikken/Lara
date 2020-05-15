<?php

namespace App\Http\Controllers;
use App\DeliveryFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class AdminTrackingController extends Controller
{
    public function index()
    {
        $infos = DeliveryFeedback::all();

        return view('admin.tracking.display',['infos' => $infos]);
    }

    public function collectData(Request $request)
    {

        return dump($request->all());

        $user_id =  Auth::User()->id;
//        $theme = $request->input('theme');
//        $message = $request->input('message');

//        $exists =  DB::table('orders')->where('user_id', $user_id);
//
//        if($exists) {
//            $order_id = DB::table('orders')->where('user_id', $user_id);
//        } else {
//            $order_id = '';
//        }
//
//        $arr = array(
//            'order_id' => '',
//            'user_id' => '',
//            'theme' => $theme,
//            'message' => $message,
//            'created_at' => \Carbon\Carbon::now()
//        );
//
//        DB::table('delivery_feedback')->insert($arr);
    }
}
