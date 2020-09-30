<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class AdminUtilsController extends Controller
{
    public function show()
    {
        $pickups = DB::table('pick_up_points')->get();

        return view('admin.pickups.display',['pickups' => $pickups]);
    }

    public function create(Request $request)
    {
        Validator::make( $request->all(), [
            'lat' => 'numeric',
            'long' => 'numeric',
            'address' => 'required',
            'closest_station' => 'required'
        ])->validate();

        $lat = $request->lat;
        $long = $request->long;
        $address = $request->address;
        $closest_station = $request->closest_station;

        $arr = array(
            'lat' => $lat,
            'long' => $long,
            'address' => $address,
            'closest_station' => $closest_station
        );

        DB::table('pick_up_points')->insert($arr);
    }
}
