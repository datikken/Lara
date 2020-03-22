<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    public function index()
    {
//        $products = DB::table('products')->get();

        $products = Product::all();

        return view('pages.catalog', compact("products"));
    }

    public function addProductToCart(Request $request, $id)
    {
//        $request->session()->forget('cart');
//        $request->session()->flush();
//

        $prevCart = $request->session()->get('cart');

        $cart = new Cart($prevCart);

        $product = Product::find($id);
        $cart->addItem($id, $product);
        $request->session()->put('cart', $cart);

//        dump($cart);

        return redirect()->route('allProducts');
    }

    public function showCart()
    {
        $cart = Session::get('cart');

        if($cart) {
            return view('layouts.cartProducts', ['cartItems' => $cart]);
        } else {
            return view('layouts.cartProducts', ['cartItems' => '']);
        }

//        return redirect()->route('allProducts');
    }
}
