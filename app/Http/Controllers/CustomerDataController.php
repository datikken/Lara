<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CustomerDataController extends Controller
{
    public function setCustomerFio(Request $request)
    {
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $tel = $request->tel;
        $save = $request->save;

        $arr = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'tel' => $tel,
            'save' => $save
        ];

        $request->session()->put('cart-customerFio', $arr);
        return response()->json((object) array('customer_fio' => $arr));
    }

    public function setIndex(Request $request)
    {
        $index = $request->index;

        $item = $request->session()->put('cart-index', $index);
        return response()->json((object) array('delivery-index' => $index));
    }

    public function setAdress(Request $request)
    {
        $city = $request->city;
        $street = $request->street;
        $house = $request->house;
        $body = $request->body;
        $building = $request->building;
        $delType = $request->deliveryType;

        $arr = [
            'city' => $city,
            'street' => $street,
            'house' => $house,
            'body' => $body,
            'building' => $building,
            'deliveryType' => $delType
        ];

        $request->session()->put('cart-address', $arr);
        return response()->json((object) array('delivery-address' => $arr));
    }

    public function setUrikInfo(Request $request)
    {

    }
}
