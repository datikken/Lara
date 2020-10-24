<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MainSliderImage;

class MainSliderImageController extends Controller
{
    public function getMainSliderImages(Request $request)
    {
        $images = MainSliderImage::all();

        return response()->json($images);
    }
}
