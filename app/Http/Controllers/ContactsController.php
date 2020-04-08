<?php
/**
 * Created by PhpStorm.
 * User: datikken
 * Date: 31.03.2020
 * Time: 00:06
 */

namespace App\Http\Controllers;


class ContactsController
{
    public function index()
    {
        return view('pages.contacts');
    }
}