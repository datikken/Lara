<?php
/**
 * Created by IntelliJ IDEA.
 * User: tikken
 * Date: 3/23/20
 * Time: 9:15 AM
 */

namespace App\Http\Controllers;


class InformationController extends Controller
{
    public function index()
    {
        return view('pages.information');
    }
}
