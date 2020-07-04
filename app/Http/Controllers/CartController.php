<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function checkCartState()
    {
        $cart = Session::get('cart');

        return response()->json($cart);
    }
}
