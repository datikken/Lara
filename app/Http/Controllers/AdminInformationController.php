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
    //Display edit product form
    public function editInformation($id)
    {
        $item = Information::find($id);
        return view('admin.information.editInformation', ['item' => $item]);
    }

    public function editInformationForm(Request $request, $id)
    {
        $category = $request->input('category');
        $ftitle = $request->input('fizik_title');
        $utitle = $request->input('urik_title');
        $ftext = $request->input('fizik_text');
        $utext = $request->input('urik_text');

        $updateArr = array(
            'category' => $category,
            'fizik_title' => $ftitle,
            'urik_title' => $utitle,
            'fizik_text' => $ftext,
            'urik_text' => $utext
        );

        DB::table('information')->where('id', $id)->update($updateArr);

        return redirect()->route('informationList');
    }

    public function showCreateInfoForm()
    {
        return view('admin.information.createInformation');
    }
    public function createInfo(Request $request)
    {
        $category = $request->input('category');
        $urik_title = $request->input('urik_title');
        $fizik_title = $request->input('fizik_title');
        $urik_text = $request->input('urik_text');
        $fizik_text = $request->input('fizik_text');

        $ext = $request->file('image')->getClientOriginalExtension();
        $stringImageReFormat = str_replace(' ', '', $request->input('category'));

        $imageName = $stringImageReFormat . '.' . $ext;

        $imageEncoded = File::get($request->image);
        Storage::disk('local')->put('public/information_icons/' . $imageName, $imageEncoded);

        $newInformationArray = array(
            'category' => $category,
            'urik_title' => $urik_title,
            'fizik_title'=>$fizik_title,
            'urik_text' => $urik_text,
            'fizik_text' => $fizik_text,
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
