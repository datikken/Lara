<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Product;

class ViewedController extends Controller
{
    public function index()
    {
        $viewed = session()->get('viewed');

        if(is_null($viewed)) {
            $resp = Product::all();

            foreach($resp as $key=>$item) {
                $resp[$key]['params'] = json_decode($item['params']);
            }

        }  else {
            foreach($viewed as $key=>$item) {
                $viewed[$key]->name_econom = json_decode($item->name_econom);
            }

            $resp = $viewed;
        }

        return response()->json($resp);
    }

    public function create($id)
    {
        $item = DB::table('products')->where('id', $id)->get();
        $sessionItem = session()->push('viewed', $item[0]);

        return response()->json($item);
    }

    public function reset()
    {
        $forget = session()->forget('viewed');
        return response()->json(array('status' => 'viewed products has been removed'));
    }
}
