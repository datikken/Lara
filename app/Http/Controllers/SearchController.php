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

        $prd = Product::search($newphrase);

        return response()->json($prd);
    }

    public function testSearch()
    {
        //Длина 335 M3550idn
        $prd = Product::search('laser')->get();


        return response()->json($prd);
    }
}
