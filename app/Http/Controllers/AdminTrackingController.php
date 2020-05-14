<?php

namespace App\Http\Controllers;
use App\DeliveryFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminTrackingController extends Controller
{
    public function index()
    {
        $infos = DeliveryFeedback::all();

        return view('admin.tracking.display',['infos' => $infos]);
    }
}
