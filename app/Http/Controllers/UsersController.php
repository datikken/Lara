<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function get_user_info() {
        $user = Auth::user();

        if(!is_null($user)) {
            $uid = $user->id;
            $user_info = DB::table('users')->where('id', $uid)->get();

            $arrToReturn = array(
                'user' => $user_info
            );

            return response()->json($arrToReturn);
        } else {
            return response()->json('must be logged in');
        }
    }
}
