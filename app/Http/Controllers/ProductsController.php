<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use App\Product_Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App\Includes\HelperString;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SendEmailController;
use stdClass;
use Auth;

class ProductsController extends Controller
{
    public function showIndex()
    {
        $products = Product::all();

        foreach ($products as $product) {
            $product['image'] = DB::table('product_images')->where('product_id', $product['id'])->value('image');
        }

        return view('pages.index', ['products' => $products]);
    }
    public function index()
    {
        $products = Product::paginate(15);

        foreach ($products as $product) {
            $product['image'] = DB::table('product_images')->where('product_id', $product['id'])->value('image');
        }

        return view('pages.catalog', compact("products"));
    }

    public function productDetails(Request $request, $id)
    {
        $product = Product::find($id);

        $images = DB::table('product_images')->where('product_id', $product['id'])->get();
        $feedItems = DB::table('product_feedback')->where('product_id', $product['id'])->get();

        $imgArr = array();

        foreach ($images as $image ) {
            array_push($imgArr, $image);
        }

        $product['images'] = $imgArr;


        return view('layouts.product_details', ['product' => $product, 'feedbacks' => $feedItems]);
    }

    public function search(Request $request)
    {
        $searchText = $request->get('searchText');
        $products = Product::where('name', 'Like', $searchText."%")->get();

        return $products;
    }

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

        if(empty($updatedCart->items)) {
            $request->session()->forget('cart');
        } else {
            $request->session()->put('cart', $updatedCart);
        }

        if(empty($cart->items)) {
            return view('components.cart.cart_empty');
        } else {
            return view('components.cart.cart_grid', ['cartItems' => $updatedCart]);
        }
    }

    public function increaseSingleProduct(Request $request, $id)
    {
        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);

        $product = Product::find($id);
        $cart->addItem($id, $product, 1);
        $request->session()->put('cart', $cart);

        $merged = Session::get('cart');

        return response()->json($merged);
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

        $merged = Session::get('cart');

        return response()->json($merged);
    }

    public function addToCartAjaxGet(Request $request, $id)
    {
        $amount = $request->input('amount');
        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);
        $product = Product::find($id);
        $cart->addItem($id, $product, $amount ? $amount : 1);
        $request->session()->put('cart', $cart);

        return response()->json((object) array('cart' => $cart->totalQuantity, 'price' => $cart->totalPrice));
    }

    public function repeatOrder($id)
    {
        $user_id = Auth::id();
        $order = DB::table('orders')->where('id', $id)->get();
        $order_items = DB::table('order_items')->where('order_id', $id)->get();
        $date = date('Y-m-d H:i:s');

        $newOrderArray = array(
            'status'=> 'on_hold',
            'date'=>$date,
            'del date' => $date,
            'price' => $order[0]->price,
            'user_id' => $user_id
        );

        $created_order = DB::table('orders')->insert($newOrderArray);
        $order_id = DB::getPdo()->lastInsertId();

        foreach($order_items as $cart_item) {
            $item_id = $cart_item->id;
            $item_name = $cart_item->item_name;
            $item_price = $cart_item->item_price;
            $item_quantity = $cart_item->quantity;

            $newItemsInCurrentOrder = array(
                'item_id' => $item_id,
                'order_id'=>$order_id,
                'item_name' => $item_name,
                'item_price'=>$item_price,
                'quantity'=> $item_quantity
            );

            $created_order_items = DB::table('order_items')->insert($newItemsInCurrentOrder);
        }

        return response()->json((object) array('success' => 'Thanks!'));
    }

    public function createOrder(Request $request)
    {
        $cart = Session::get('cart');
        $user_id = Auth::id();

        if($cart) {
            $date = date('Y-m-d H:i:s');

            $newOrderArray = array(
                'status'=> 'on_hold',
                'date'=>$date,
                'del date' => $date,
                'price' => $cart->totalPrice,
                'user_id' => $user_id
            );

            $created_order = DB::table('orders')->insert($newOrderArray);
            $order_id = DB::getPdo()->lastInsertId();

            foreach($cart->items as $cart_item){
                $item_id = $cart_item['data']['id'];
                $item_name = $cart_item['data']['name'];
                $item_price = $cart_item['data']['price'];
                $item_quantity = $cart_item['quantity'];

                $newItemsInCurrentOrder = array(
                    'item_id' => $item_id,
                    'order_id'=>$order_id,
                    'item_name' => $item_name,
                    'item_price'=>$item_price,
                    'quantity'=> $item_quantity
                );

                $created_order_items = DB::table('order_items')->insert($newItemsInCurrentOrder);
            }

            Session::forget('cart');
            Session::flush();

            $payment_info = $newOrderArray;
            $request->session()->put('payment_info', $payment_info);

            $mailer = new SendEmailController();
            $mailer::sendOrderWasCreated($order_id);

            return redirect()->route('proceedPayment')->withsuccess('thanks for choosing us');
        } else {
            return redirect()->route('allProducts');
        }
    }

    public function checkoutProducts()
    {
        return view('pages.cart.checkoutProducts');
    }

    public function setCustomerFio(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $tel = $request->input('tel');
        $save = $request->input('save');

        $arr = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'tel' => $tel,
            'save' => $save
        ];

        $request->session()->put('cart-customerFio', $arr);
        return response()->json((object) array('customer_fio' => $arr));
    }

    public function setDelivery()
    {
        return view('pages.delivery');
    }

    public function deliveryForm()
    {
        return view('pages.cart.deliveryForm');
    }

    public function setIndex(Request $request)
    {
        $index = $request->input('index');

        $arr = [
            'index' => $index,
        ];

        $request->session()->put('cart-index', $arr);
    }

    public function setAddress(Request $request)
    {
        $city = $request->input('city');
        $street = $request->input('street');
        $house = $request->input('house');
        $body = $request->input('body');
        $building = $request->input('building');
        $delType = $request->input('deliveryType');

        $arr = [
            'city' => $city,
            'street' => $street,
            'house' => $house,
            'body' => $body,
            'building' => $building,
            'deliveryType' => $delType
        ];

        $request->session()->put('cart-address', $arr);
        return response()->json((object) array('delivery-address' => $arr));
    }

    public function setIssue(Request $request)
    {
        $metro = $request->input('metro');
        $issue = $request->input('issue');

        $arr = [
            'issue' => $issue,
            'metro' => $metro
        ];

        $request->session()->put('cart-issue', $arr);
    }
}
