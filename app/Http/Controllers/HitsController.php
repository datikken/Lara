<?php
/**
 * Created by IntelliJ IDEA.
 * User: tikken
 * Date: 3/23/20
 * Time: 9:36 AM
 */

namespace App\Http\Controllers;


class HitsController
{
    public function index()
    {
        return view('pages.hits');
    }
}
