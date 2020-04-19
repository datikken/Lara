<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminInformationController extends Controller
{
    public function index()
    {
        $information = Information::all();
        return view('admin.information.displayInformation', ['information' => $information]);
    }

    public function showCreateInfoForm()
    {
        return view('admin.information.createInformation');
    }
    public function createInfo(Request $request)
    {

        $category = $request->input('category');
        $title = $request->input('title');
        $text = $request->input('text');

        dump($request->file('image'));

        $ext = $request->file('image')->getClientOriginalExtension();
        $stringImageReFormat = str_replace(' ', '', $request->input('title'));

        $imageName = $stringImageReFormat . '.' . $ext;

        $imageEncoded = File::get($request->image);
        Storage::disk('local')->put('public/information_icons/' . $imageName, $imageEncoded);

        $newInformationArray = array(
            'category' => $category,
            'title'=>$title,
            'text' => $text,
            'image' => $imageName
        );

        $created = DB::table('information')->insert($newInformationArray);

        if($created) {
            return redirect()->route('informationList');
        } else {
            return 'Information was not created';
        }
    }


    public function deleteInfo(Request $request, $id)
    {
        $product = Information::find($id);

        Information::destroy($id);

        return redirect()->route('informationList');
    }

}
