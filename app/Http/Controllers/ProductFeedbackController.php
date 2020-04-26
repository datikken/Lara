<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductFeedbackController extends Controller
{
    //
    public function index(Request $request)
    {

        $name = $request->input('name');
        $email = $request->input('email');
        $recommendation = $request->input('recommendation');
        $feedback = $request->input('feedback');
        $id = $request->input('product_id');
        $plus = $request->input('features');
        $minus = $request->input('minuses');

        $arr = array(
            'product_id' => $id,
            'name' => $name,
            'email' => $email,
            'recommendation' => $recommendation,
            'minus' => $minus,
            'plus' => $plus,
            'feedback' => $feedback
        );

        DB::table('product_feedback')->insert($arr);

    }
}
