<?php
/**
 * Created by IntelliJ IDEA.
 * User: tikken
 * Date: 3/23/20
 * Time: 9:57 AM
 */

namespace App\Http\Controllers;
use Config;

class AboutController
{
    public function index()
    {

        $years = [
            2009, 2010,
            2011, 2012,
            2013, 2014,
            2015, 2016,
            2017, 2018,
            2019, 2020
        ];

        return view('pages.about', ['years' => $years]);
    }
}
