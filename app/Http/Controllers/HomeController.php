<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.home');
    }

    public function showFillProfileForm()
    {
        return view('pages.dash.dash_fill');
    }

    public function showFillAdressesForm()
    {
        return view('pages.dash.adresses_fill');
    }

    public function FillAdresses(Request $request)
    {

        $user_id = auth()->user()->id;
        $country = $request->input('country');
        $city = $request->input('city');
        $street = $request->input('street');
        $home = $request->input('home');
        $wing = $request->input('wing');
        $building = $request->input('building');
        $porch = $request->input('porch');
        $intercom = $request->input('intercom');
        $floor = $request->input('floor');
        $flat = $request->input('flat');

        $arr = array(
            'user_id' => $user_id,
            'country' => $country,
            'city' => $city,
            'street' => $street,
            'home' => $home,
            'wing' => $wing,
            'building' => $building,
            'porch' => $porch,
            'intercom' => $intercom,
            'floor' => $floor,
            'flat' => $flat
        );

        DB::table('users_adresses')->insert($arr);

        return redirect()->route('home');
    }

    public function setUsersAvatar(Request $request)
    {
        $userId = Auth::id();

        $ext = $request->file('img')->getClientOriginalExtension();
        $stringImageReFormat = str_replace(' ', '', $userId);
        $imageName = $stringImageReFormat . '.' . $ext;
        $imageEncoded = File::get($request->img);

        Storage::disk('local')->put('public/user_avatars/' . $imageName, $imageEncoded);
//        DB::table('users_info')->insert();

    }

}
