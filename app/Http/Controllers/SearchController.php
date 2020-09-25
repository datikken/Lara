<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $payload = $request->payload;
        $arr = array('-', ',', '/', '.', ')', '(', '№');
        $newphrase = str_replace($arr, ' ', $payload);

        $prd = Product::search($newphrase)->get();

        return response()->json($prd);
    }

    public function testSearch()
    {
        //Длина 335 M3550idn
        $prd = Product::search('1005')->get();


        return response()->json($prd);
    }
}
