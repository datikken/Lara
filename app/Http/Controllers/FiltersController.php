<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FiltersController extends Controller
{

    public function index()
    {
        $pr = Product::where('params', 'Like','%'.'8,5'."%")->paginate(15);

        return $pr;
    }

    public function restructureParams()
    {
        $products = Product::all();

        $typeBasedArr = array();

        foreach($products as $product)
        {
            $params = json_decode($product->params);
            $product->params = $params;
            $arr = array();

            foreach($product['params'] as $key=>$param)
            {
                foreach($param as $key=>$val)
                {
                  $arr[$key] = $val;
                }
            }

            $product['params'] = $arr;
        }

        return $products;
    }
}
