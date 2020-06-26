<?php

namespace App\Http\Controllers;
use App\MainSliderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminMainSliderController extends Controller
{
    public function display()
    {
        $images = MainSliderImage::all();
        return view('admin.slider.display', ['images' => $images]);
    }

    public function showCreateForm()
    {
        return view('admin.slider.create');
    }

    public function create(Request $request)
    {
        $fileName = $request->file('file')->getClientOriginalName();
        $imageEncoded = File::get($request->file('file'));
        Storage::disk('local')->put('public/main_slider_images/'. $fileName, $imageEncoded);
        MainSliderImage::create(['image' => $fileName]);
    }


    public function delete($id)
    {
        $record = MainSliderImage::find($id);
        Storage::disk('local')->delete('public/main_slider_images/'. $record->image);
        $record->delete();
        return redirect()->route('AdminMainSlider');
    }
}
