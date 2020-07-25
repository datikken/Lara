<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function get_user_info() {
        $user = Auth::user();
        return response()->json($user);
    }
}
