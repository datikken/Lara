<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Includes\HelperString;
use Illuminate\Support\Facades\DB;
use stdClass;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::paginate(3);

        return view('pages.catalog', compact("products"));
    }

    public function productDetails(Request $request, $id)
    {
        $product = Product::find($id);

        return view('layouts.product_details', ['product' => $product]);
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

    public function increaseSingleProduct(Request $request, $id)
    {
        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);

        $product = Product::find($id);
        $cart->addItem($id, $product);
        $request->session()->put('cart', $cart);

        return redirect()->route('cartItems');
    }

    public function decreaseSingleProduct(Request $request, $id)
    {
        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);

        if($cart->items[$id]['quantity'] > 1) {
            $product = Product::find($id);

            $cart->items[$id]['quantity'] = $cart->items[$id]['quantity'] - 1;
            $cart->items[$id]['totalPrice'] = $cart->items[$id]['quantity'] * $product['price'];
            $cart->updatePriceAndQuantity();

            $request->session()->put('cart', $cart);
        }

        return redirect()->route('cartItems');
    }

    public function createOrder()
    {
        $cart = Session::get('cart');


        if($cart) {
            $date = date('Y-m-d H:i:s');
            $newOrderArray = array(
                'status'=>'on_hold',
                'date'=>$date,
                'del date' => $date,
                'price' => $cart->totalPrice
            );

            $created_order = DB::table('orders')->insert($newOrderArray);
            $order_id = DB::getPdo()->lastInsertId();

            foreach($cart->items as $cart_item){
                $item_id = $cart_item['data']['id'];
                $item_name = $cart_item['data']['name'];
                $item_price = $cart_item['data']['price'];
                $newItemsInCurrentOrder = array(
                    'item_id' => $item_id,
                    'order_id'=>$order_id,
                    'item_name' => $item_name,
                    'item_price'=>$item_price
                );

                $created_order_items = DB::table('order_items')->insert($newItemsInCurrentOrder);
            }

            Session::forget('cart');
            Session::flush();

            return redirect()->route('allProducts')->withsuccess('thanks for choosing us');
        } else {
            return redirect()->route('allProducts');
        }
    }
}
