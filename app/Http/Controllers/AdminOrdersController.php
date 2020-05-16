<?php

namespace App\Http\Controllers;

use App\Orders;
use Illuminate\Http\Request;

class AdminOrdersController extends Controller
{
    public function index()
    {
        $orders = Orders::all();

        return view('admin.orders.display', ['orders' => $orders]);
    }
}
