<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;
use Illuminate\Support\Facades\DB;

class AdminInformationController extends Controller
{
    public function index()
    {
        $information = Information::all();
        return view('admin.information.displayInformation', ['information' => $information]);
    }
}
