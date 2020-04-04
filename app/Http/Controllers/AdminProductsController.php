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

    //Display edit product form
    public function editProductForm($id)
    {
        $product = Product::find($id);
        return view('admin.editProductForm', ['product' => $product]);
    }

    //Display edit product image form
    public function editProductImageForm($id)
    {
        $product = Product::find($id);
        return view('admin.editProductImageForm', ['product' => $product]);
    }
}
