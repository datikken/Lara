<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class AdminProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.displayProducts', ['products' => $products]);
    }
}
