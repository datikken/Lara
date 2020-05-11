<?php
/**
 * Created by IntelliJ IDEA.
 * User: tikken
 * Date: 3/23/20
 * Time: 9:57 AM
 */

namespace App\Http\Controllers;
use App\About;
use Config;

class AboutController
{
    public function index()
    {
        $years = About::all()->sortBy('year');

        return view('pages.about', ['years' => $years]);
    }
}
