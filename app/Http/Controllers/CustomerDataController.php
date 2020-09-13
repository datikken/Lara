<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerDataController extends Controller
{

    public function setStockPickUpPoint(Request $request)
    {
        $name = $request->name;
        $adr = $request->adr;

        $toSave = array(
            'name' => $name,
            'adr' => $adr
        );

        $request->session()->put('cart_pickup', $toSave);

        return response()->json($toSave);
    }

    public function setUrikInfo(Request $request)
    {
        $inn = $request->inn;
        $bik = $request->bik;
        $rs = $request->rs;

        $arr = [
            'inn' => $inn,
            'bik' => $bik,
            'rs' => $rs
        ];

        $request->session()->put('cart_cutomerInfo', $arr);
        return response()->json((object) array('cutomer_info' => $arr));
    }
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

        $request->session()->put('cartCustomerFio', $arr);
        return response()->json((object) array('customer_fio' => $arr));
    }

    public function setIndex(Request $request)
    {
        $index = $request->index;
        $item = $request->session()->put('cartIndex', $index);

        return response()->json((object) array('deliveryIndex' => $index));
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

        $request->session()->put('cartAddress', $arr);
        return response()->json((object) array('deliveryAddress' => $arr));
    }

    public function getSessionInfo()
    {
        $cart_pickup = Session::get('cart_pickup');
        $payment_info = Session::get('payment_info');
        $fio = Session::get('cartCustomerFio');
        $index = Session::get('cartIndex');
        $adresss = Session::get('cartAddress');
        $urik = Session::get('cart_cutomerInfo');

        $arr = array(
            'cart_pickup' => $cart_pickup,
            'payment_info' => $payment_info,
            'fio' => $fio,
            'index' => $index,
            'adress' => $adresss,
            'urik' => $urik
        );

        return response()->json($arr);
    }
}
