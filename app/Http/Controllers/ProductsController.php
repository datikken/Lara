<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Includes\HelperString;
use stdClass;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::paginate(3);

        return view('pages.catalog', compact("products"));
    }

    public function search(Request $request)
    {
        $searchText = $request->get('searchText');
        $products = Product::where('name', 'Like', $searchText."%")->paginate(3);

        return view('components.products_grid/products_grid', compact('products'));

    }

    public function addProductToCart(Request $request, $id)
    {
        $prevCart = $request->session()->get('cart');

        $cart = new Cart($prevCart);

        $product = Product::find($id);
        $cart->addItem($id, $product);
        $request->session()->put('cart', $cart);

        return redirect()->route('allProducts');
    }

    public function showCart()
    {
        $cart = Session::get('cart');
        $empty = new stdClass();

        if($cart) {
            return view('layouts.cartProducts', ['cartItems' => $cart]);
        } else {
            return view('layouts.cartProducts', ['cartItems' => $empty]);
        }
    }

    public function deleteItemFromCart(Request $request, $id)
    {
        $str = HelperString::onlyNumber($id);

        $cart = $request->session()->get('cart');

        if(array_key_exists($str, $cart->items))
        {
             unset($cart->items[$str]);
        }

        $prevCart = $request->session()->get('cart');

        $updatedCart = new Cart($prevCart);
        $updatedCart->updatePriceAndQuantity();

        $request->session()->put('cart', $updatedCart);

        return redirect()->route('cartItems');

    }
}
