<?php
/**
 * Created by IntelliJ IDEA.
 * User: datikken
 * Date: 14.05.2020
 * Time: 17:16
 */

namespace App\Http\Controllers;
use App\User;


class AdminUsersController
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.display', ['users'=> $users]);
    }

    public function makeAdmin()
    {}
}
