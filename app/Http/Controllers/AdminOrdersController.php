<?php

namespace App\Http\Controllers;

use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrdersController extends Controller
{
    public function index()
    {
        $orders = Orders::all();

        return view('admin.orders.display', ['orders' => $orders]);
    }

    public function changeOrderStatus(Request $request)
    {
        $status = $request->status;
        $id = $request->id;

        $order = Orders::find($id);
        DB::table('orders')->where('id', $order->id)->update(['status' => $status]);

        return response()->json(['status' => $status, 'id' => $id,]);
    }
}
