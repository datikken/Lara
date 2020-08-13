<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ProductFeedbackController extends Controller
{
    //
    public function index(Request $request)
    {
        $user_id = Auth::id();
        $name = $request->input('name');
        $email = $request->input('email');
        $recommendation = $request->input('recommendation');
        $feedback = $request->input('feedback');
        $id = $request->input('product_id');
        $plus = $request->input('features');
        $minus = $request->input('minuses');
        $date = date('Y-m-d H:i:s');

        if(!$user_id) {
            $user_id = 'not authorized';
        }

        $arr = array(
            'product_id' => $id,
            'name' => $name,
            'email' => $email,
            'user_id' => $user_id,
            'recommendation' => $recommendation,
            'minus' => $minus,
            'plus' => $plus,
            'feedback' => $feedback,
            'created_at' => $date
        );

        DB::table('product_feedback')->insert($arr);

        return response()->json($arr);

    }
}
