<?php
/**
 * Created by PhpStorm.
 * User: datikken
 * Date: 07.04.2020
 * Time: 01:43
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SubscriptionsController extends Controller
{
    public function subscribe(Request $request)
    {

        $email = $request->input('email');
        $date = date('Y-m-d H:i:s');

        $subscription = array(
            'email'=>$email,
            'date'=>$date
        );

        DB::table('subscriptions')->insert($subscription);

        return redirect()->route('allProducts');
    }
}