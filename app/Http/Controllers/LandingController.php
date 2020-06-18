<?php
/**
 * Created by IntelliJ IDEA.
 * User: tikken
 * Date: 3/23/20
 * Time: 4:11 PM
 */

namespace App\Http\Controllers;


class LandingController extends Controller
{
    public function index()
    {
        return view('pages.landings.landing');
    }

    public function second()
    {
        return view('pages.landings.landingt2');
    }
}
