<?php
/**
 * Created by PhpStorm.
 * User: datikken
 * Date: 31.03.2020
 * Time: 00:06
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController
{
    public function index()
    {
        return view('pages.contacts');
    }

    public function collectFeedback(Request $request)
    {
        dump($request);
    }
}
