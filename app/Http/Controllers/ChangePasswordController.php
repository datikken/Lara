<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Validator;


class ChangePasswordController extends Controller
{
    public function checkTokenExpireDate(Request $request)
    {
        $email = $request->email;
        $token = $request->token;

        Validator::make( $request->all(), [
            'email' => 'required',
            'token' => 'required'
        ])->validate();

        $email = 'tikken23@gmail.com';

        $lastReset = DB::table('password_resets')->where('email', $email)->latest('expires')->first();
        $lastResetExpire = Carbon::parse($lastReset->expires)->timestamp;
        $current_date_time = Carbon::now()->timestamp;

        if($current_date_time < $lastResetExpire) {
            return response()->json(['status' => 200, 'message' => 'Token is valid']);
        } else {
            return response()->json(['status' => 403, 'message' => 'Token is invalid']);
        }
    }
    public function createResetToken($email)
    {
        $user = DB::table('users')->where('email', '=', $email)
            ->first();

        $result = array('status' => 404, 'message' =>  'User with given email is not found');

        if(!is_null($user)) {
            $token = str_random(60);
            $carbNow = new DateTime();

            $now = $carbNow;
            $expires = now()->addMinutes(120);

            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => $now,
                'expires' => $expires
            ]);

            $result = array('status' => 200, 'message' =>  $token);
        }

        return $result;
    }
    public function storeFromEmail(Request $request)
    {
        $email = $request->email;
        $new_password = $request->new_password;

        $request->validate([
            'email' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::where('email', $email)->update(['password'=> Hash::make($new_password)]);

        return response()->json(['status' => 200, 'message' => 'Password successfully updated.']);
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
