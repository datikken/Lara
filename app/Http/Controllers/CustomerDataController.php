<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerDataController extends Controller
{
    public function setCustomerFio(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $tel = $request->input('tel');
        $save = $request->input('save');

        $arr = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'tel' => $tel,
            'save' => $save
        ];

        $request->session()->put('cart-customerFio', $arr);
        return response()->json((object) array('customer_fio' => $arr));
    }

    public function deliveryForm()
    {
        return view('pages.cart.deliveryForm');
    }
}
