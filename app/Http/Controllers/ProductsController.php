<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

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
        print_r($id);
    }
}
