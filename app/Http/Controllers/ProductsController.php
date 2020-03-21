<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = ['1','2','3'];

        return view('allproducts', compact("products"));
    }
}
