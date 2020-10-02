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

        $email = $request->email;
        $token = str_random(60);
        $url = redirect()->to('/resetPassword')->with(['token' => $token, 'email' => $email ]);

        dd($url);

        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

//    TODO create reset link
//        : http://recart.me/password/reset/5ce4a30f1cb2b42f41a9ae6c230b3697ce7a07bee0a4bb41a961281017252ba7?email=tikken23%40gmail.com
//        Mail::to($request->email)->send(new SendMail(['name' => $name, 'message' => '']));

        return response()->json(['fine']);
    }


    public function showResetPasswordForm(Request $request)
    {
        $token = $request->token;
        $email = $request->email;

        return view('auth.login',['reset' => 'true','token' => $token, 'email' => $email]);
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
