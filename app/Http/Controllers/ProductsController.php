<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Includes\HelperString;
use Illuminate\Http\Request;
use App\MainSliderImage;
use App\Product;
use App\Cart;
use App\Post;
use Auth;

class ProductsController extends Controller
{
    public function showIndex()
    {
        $slides = MainSliderImage::all();
        $products = Product::all();
        $posts = Post::all();

        foreach ($products as $product) {
            $product['image'] = DB::table('product_images')->where('product_id', $product['id'])->value('image');
        }

        foreach ($posts as $post) {
            $post['url'] = URL::to('/blog') .'/'. $post->id();
        }

        $firstThirty = array();

        foreach ($products->take(30) as $key=>$product)
        {
            if(!is_null($product['photo'])) {
                $firstThirty[$key] = $product;
            }
        }

        $vwd = session()->get('viewed');

        if(is_null($vwd)) {
            $vwd = $firstThirty;
        }

        if($vwd) {
            foreach ($vwd as $key=>$item) {
                if(!is_object($item->params)) {
                    $vwd[$key]->params = json_decode($item->params);
                }
            }
        }

        foreach ($firstThirty as $key=>$val) {
            if(!is_object($val['params'])) {
                $firstThirty[$key]['params'] = json_decode($val['params']);
            }
        }

        return view('pages.index', ['products' => $firstThirty, 'slides' => $slides, 'news' => $posts, 'vwd' => $vwd ]);
    }
    public function catalogHTML()
    {
        $products = Product::paginate(15);
        $posts = Post::all();

        foreach ($products as $product) {
            $product['image'] = DB::table('product_images')->where('product_id', $product['id'])->value('image');
            $product['name'] = json_decode($product['name_econom']);
            $images = DB::table('product_images')->where('product_id', $product['id'])->get();

            $arr = array();

            foreach($images as $key=>$val) {
                $arr[$key] = $val;
            }

            $product['images'] = $arr;
        }

        foreach ($posts as $post) {
            $post['url'] = URL::to('/blog') .'/'. $post->id();
        }

        return view('pages.catalog', ['products' => $products, 'news' => $posts]);
    }
    public function index(Request $request)
    {
        $products = Product::all();
        $posts = Post::all();

        foreach ($products as $product) {
            $product['image'] = DB::table('product_images')->where('product_id', $product['id'])->value('image');
            $product['name'] = json_decode($product['name_econom']);

            $images = DB::table('product_images')->where('product_id', $product['id'])->get();

            $arr = array();

            foreach($images as $key=>$val) {
                $arr[$key] = $val;
            }

            $product['images'] = $arr;
        }

        foreach ($posts as $post) {
            $post['url'] = URL::to('/blog') .'/'. $post->id();
        }

        return response()->json($products);
    }

    public function productDetails(Request $request, $id)
    {
        $cape = array();
        $imgArr = array();

        $product = Product::find($id);

        $images = DB::table('product_images')->where('product_id', $product['id'])->get();
        $feedItems = DB::table('product_feedback')->where('product_id', $product['id'])->get();
        $product['cape'] = json_decode($product['cape']);

        foreach ($feedItems as  $key=>$value) {
            $usverAvatar = DB::table('users_info')->where('user_id', $value->user_id)->value('image');
            $usverName = DB::table('users')->where('id', $value->user_id)->value('name');
            $feedItems[$key]->user_avatar = $usverAvatar;
            $feedItems[$key]->user_name = $usverName;
        }

        foreach ($images as $image ) {
            array_push($imgArr, $image);
        }

        $newParams = array('');

        function pushToArr($obj) {
            $arr = new \stdClass();

            foreach ($obj as $a=>$b) {
                $arr->brand = $a;
                $arr->model = $b;
            }

            return $arr;
        }

        foreach ($product['cape'] as $key=>$item) {
            $ret = pushToArr($item);
            array_push($newParams, $ret);
        }

        $merged = array();

        foreach ($newParams as $key=>$prm) {
            if($prm != '') {
                if(isset($merged[$prm->brand])) {
                    $merged[$prm->brand] = $merged[$prm->brand] . ', ' . $prm->model;
                } else {
                    $merged[$prm->brand] = $prm->model;
                }
            }
        }


        $product['cape'] = $merged;

        $product['name_econom'] = json_decode($product['name_econom']);
        $product['feedback'] = $feedItems;

        if ($request->ajax()) {
            return response()->json($product);
        }

        $params = json_decode($product['params']);

        $bigImage = strval($params->Бренд . '/BIG/' . $product['photo'] . '.png');
        $smallImage = strval($params->Бренд . '/SMALL/' . $product['photo'] . '.png');

        $bigExists = Storage::disk('local')->exists('/public/product_images/' . $bigImage);
        $smallExists = Storage::disk('local')->exists('/public/product_images/' . $smallImage);

        if($bigExists) {
            array_push($imgArr,(object) array('image' => $bigImage) );
        } else {
            if($smallExists) {
                array_push($imgArr,(object) array('image' => $smallImage) );
            }
        }

        $product['images'] = $imgArr;

        return view('pages.product_details', ['product' => $product, 'feedbacks' => $feedItems]);
    }

    public function search()
    {
        $products = Product::all();
        return response()->json($products);
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

        $merged = Session::get('cart');

        return response()->json($merged);
    }

    public function checkoutProducts()
    {
        return view('pages.cart.checkoutProducts');
    }

    public function setIssue(Request $request)
    {
        $metro = $request->input('metro');
        $issue = $request->input('issue');

        $arr = [
            'issue' => $issue,
            'metro' => $metro
        ];

        $request->session()->put('cart_pickup', $arr);
    }
}
