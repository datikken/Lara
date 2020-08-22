<?php
/**
 * Created by PhpStorm.
 * User: datikken
 * Date: 13.04.2020
 * Time: 05:41
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Validator;
use App\Http\Controllers\Controller;
use App\Product;
use App\Cart;


class PaymentsController extends Controller
{
    public function proceedPayment(Request $request)
    {
        $payment_info = Session::get('payment_info');

        //not paid
        if($payment_info['status'] == 'on_hold') {
            return view('pages.cart.payment', ['payment_info' => $payment_info]);
        } else {
            return redirect()->route('allProducts');
        }
    }

    public function setPaymentProvider(Request $request)
    {
        $provider = $request->provider;
        $orderId = $request->orderId;

//        DB::table('orders')->select();

        return response()->json(array($provider, $orderId));
    }
}
