<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;


class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function createResetToken(Request $request)
    {
//        $str = 'love';
//        dd($str);

        $user = DB::table('users')->where('email', '=', $request->email)
            ->first();

//        dd($user);

        $token = str_random(60);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::to($request->email)->send(new SendMail(['name' => '', 'message' => '', 'token' => $token]));

        return response()->json(['fine']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return response()->json('Password successfully updated.');
    }
}
