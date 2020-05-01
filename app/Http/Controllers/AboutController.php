<?php
/**
 * Created by IntelliJ IDEA.
 * User: tikken
 * Date: 3/23/20
 * Time: 9:57 AM
 */

namespace App\Http\Controllers;


class AboutController
{
    public function index()
    {
        $years = Config::get('constants.ABOUTYEARS');

        return view('pages.about', ['years' => $years]);
    }
}
