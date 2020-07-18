<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use stdClass;


class CartController extends Controller
{
    public function showCart()
    {
        $cart = Session::get('cart');
        $empty = new stdClass();
        $empty->items = array();
        $empty->totalPrice = '';

        if($cart) {
            return view('pages.cart.cartProducts', ['cartItems' => $cart]);
        } else {
            return view('pages.cart.cartProducts', ['cartItems' => $empty]);
        }
    }

    public function checkCartState()
    {
        $cart = Session::get('cart');

        return response()->json($cart);
    }
}
