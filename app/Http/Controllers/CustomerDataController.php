<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;

class CustomerDataController extends Controller
{
    private $token = '4e9f0c231f89258c18f52beaff5a2da36623d920';
    private $secret = '2383a183f695e066aad81565e71c42add6d9aa16';

    public function setIndex(Request $request)
    {
        $index = $request->index;
        $item = $request->session()->put('cartIndex', $index);

        $dadata = new \Dadata\DadataClient($this->token, null);
        $result = $dadata->suggest("postal_unit", $index);


        return response()->json((object) array('deliveryIndex' => $index, 'suggestedOffice' => $result));
    }

    public function checkAdressInDadata(Request $request)
    {
        $dadata = new \Dadata\DadataClient($this->token, $this->secret);

        $city = $request->city;
        $street = $request->street;
        $house = $request->house;
        $body = $request->body;
        $building = $request->building;

        $addr = $city . " " . $street . " " . $house . " " . $body . " " . $building;

//        $result = $dadata->suggest("address", $addr);
        $result = $dadata->clean("address", $addr);

        return response()->json($result);
    }

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

    public function setAdress(Request $request)
    {
        $city = $request->city;
        $index = $request->index;
        $street = $request->street;
        $home = $request->home;
        $floor = $request->floor;
        $building = $request->building;
        $flat = $request->flat;
        $wing = $request->wing;
        $porch = $request->porch;
        $intercom = $request->intercom;
        $delType = $request->deliveryType;
        $deliveryNote = $request->deliveryNote;

        $arr = [
            'city' => $city,
            'street' => $street,
            'home' => $home,
            'wing' => $wing,
            'building' => $building,
            'porch' => $porch,
            'intercom' => $intercom,
            'floor' => $floor,
            'flat' => $flat,
            'index' => $index,
            'deliverNote' => $deliveryNote,
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
        $viewed = Session::get('viewed');

        $arr = array(
            'cart_pickup' => $cart_pickup,
            'payment_info' => $payment_info,
            'fio' => $fio,
            'index' => $index,
            'adress' => $adresss,
            'urik' => $urik,
            'viewed' => $viewed
        );

        return response()->json($arr);
    }

    public function clearAllSessionInfo()
    {
        Session::flush();

        return response()->json(['session has been flushed']);
    }
}
