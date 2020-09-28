<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
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
        $usr_id = Auth::id();
        $user = DB::table('users')->where('id', $usr_id)->get();
        $userAvatar = DB::table('users')->where('id', $usr_id)->value('image');

        return view('pages.dash.dash_fill', ['user' => $user[0], 'user_avatar' => $userAvatar]);
    }

    public function showFillAdressesForm()
    {
        $user_id = Auth::id();
        $address = DB::table('users_adresses')->where('user_id', $user_id)->get();

        if ($address->count() > 0) {
            return view('pages.dash.adresses_fill', ['address' => $address]);
        } else {
            return view('pages.dash.adresses_fill', ['address' => $address]);
        }
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

        $arr = array(
            'image' => $imageName,
        );

        $exst = DB::table('users')->where('id', $userId)->value('id');

        if ($exst) {
            DB::table('users')->where('id', $userId)->update($arr);
        } else {
            DB::table('users')->insert($arr);
        }

        return redirect()->route('fillProfile');
    }

    public function displayOrders()
    {
        $user_id = Auth::id();
        $type = DB::table('users')->where('id', id)->select('face', 'email', 'name')->first();
        $orders_history = DB::table('orders')->where('user_id', $user_id)->where('status', 'arrived')->get();
        $orders_actual = DB::table('orders')->where('user_id', $user_id)->get();
        $array = array_filter((array)$orders_actual);

        if (empty($array)) {
            $orders_actual = null;
        }

        if (DB::table('orders')->where('user_id', $user_id)->where('status', 'arrived')->get()->last()) {
            $last_order_id = DB::table('orders')->where('user_id', $user_id)->where('status', 'arrived')->get()->last()->id;
            $last_order = DB::table('order_items')->where('order_id', $last_order_id)->get();
            $last_order_total = DB::table('orders')->where('id', $last_order_id)->where('status', 'arrived')->get();
            $last_order->id = $last_order_id;

            return view('pages.dash.dash_orders',
                [
                    'orders_actual' => $orders_actual,
                    'orders_history' => $orders_history,
                    'user' => $type,
                    'last_order' => $last_order,
                    'last_order_total' => $last_order_total
                ]
            );
        } else {
            return view('pages.dash.dash_orders', [
                'orders_actual' => $orders_actual,
                'user' => $type
            ]);
        }
    }

    public function collectProfileData(Request $request)
    {
        $userId = Auth::id();

        Validator::make($request->all(), [
            'name' => 'max:500',
            'lastname' => 'max:500',
            'tel' => 'numeric',
            'email' => 'email'
        ])->validate();

        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $tel = $request->input('tel');
        $mail = $request->input('email');

        if ($name) {
            DB::table('users')->where('id', $userId)->update(['name' => $name]);

            return response()->json(['message' => 'Name successfully changed']);
        }

        if ($mail) {
            DB::table('users')->where('id', $userId)->update(['email' => $mail]);
            return response()->json(['message' => 'Email successfully changed']);
        }

        if ($lastname) {
            $exists = DB::table('users')->where('id', $userId)->value('id');

            if (isset($exists)) {
                DB::table('users')->where('id', $userId)->update(['lastname' => $lastname]);
            } else {
                DB::table('users')->insert(['lastname' => $lastname]);
            }

            return response()->json(['message' => 'Lastname successfully changed']);
        }

        if ($tel) {
            DB::table('users')->where('id', $userId)->update(['tel' => $tel]);
            return response()->json(['message' => 'Tel successfully changed']);
        }
    }
}
