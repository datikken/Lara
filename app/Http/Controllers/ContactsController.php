<?php
/**
 * Created by PhpStorm.
 * User: datikken
 * Date: 31.03.2020
 * Time: 00:06
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContactsController
{
    public function index()
    {
        return view('pages.contacts');
    }

    public function collectFeedback(Request $request)
    {
        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $theme = $request->input('theme');
        $message = $request->input('message');

        $arr = array(
            'name' => $name,
            'lastname' => $lastname,
            'theme' => $theme,
            'message' => $message,
            'date' => \Carbon\Carbon::now()
        );

        // dd($arr);

        Validator::make( $request->all(), [
            'name' => 'required',
            'lastname' => 'required',
            'theme' => 'required',
            'message' => 'required',
        ])->validate();

        DB::table('contacts_feedback')->insert($arr);

        return redirect('contacts');
    }
}
