<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Banner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminBannersController extends Controller
{
    public function index()
    {
        $banners = Banner::all();

        if (!Auth::check()) {
            return redirect()->route('home');
        } else {
            return view('admin.banners.displayBanners', ['banners' => $banners]);
        }
    }

    //Display edit product form
    public function editBannersForm($id)
    {
        $product = Banner::find($id);
        return view('admin.banners.editBannersForm', ['product' => $product]);
    }
    //Display edit product image
    public function editBannersImageForm($id)
    {
        $product = Banner::find($id);
        return view('admin.banners.editBannersImageForm', ['product' => $product]);
    }

    public function updateBannersImage(Request $request, $id)
    {
        Validator::make( $request->all(), ['image' => 'max:5000'])->validate();

        if($request->hasFile('image')) {
            $product = Banner::find($id);
            $exists =  Storage::disk('local')->exists('public/banners_images' . $product->image);

            //delete old image
            if($exists) {
                Storage::delete('public/banners_images' . $product->image);
            }

            $request->image->storeAs('public/banners_images/', $product->image);

            $arrToUpdate = array('image' => $product->image);

            DB::table('products')->where('id', $id)->update($arrToUpdate);

            return redirect()->route('adminDisplayBanners');

        } else {
            $error = 'no image was selected';
            return $error;
        }
    }

    public function updateBanners(Request $request, $id)
    {
        $name = $request->input('name');
        $type = $request->input('type');
        $price = preg_replace('/[^0-9.]/', '', $request->input('price'));

        $updateArr = array('name' => $name, 'type' => $type, 'price' => $price);

        DB::table('products')->where('id', $id)->update($updateArr);

        return redirect()->route('adminDisplayBanners');
    }

    public function createBannerForm()
    {
        return view('admin.banners.createBanner');
    }

    public function sendCreateBannersForm(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $type = $request->input('type');
        $price = $request->input('price');
        $category = $request->input('category');

        //Validator::make( $request->all(), ['image' => 'max:5000'])->validate();
        $ext = $request->file('image')->getClientOriginalExtension();
        $stringImageReFormat = str_replace(' ', '', $request->input('name'));

        $imageName = $stringImageReFormat . '.' . $ext;

        $imageEncoded = File::get($request->image);
        Storage::disk('local')->put('public/banners_images/' . $imageName, $imageEncoded);

        $newBannersArray = array(
            'name' => $name,
            'description' => $description,
            'image'=>$imageName,
            'type' => $type,
            'price' => $price,
            'category' => $category
        );

        $created = DB::table('products')->insert($newBannersArray);

        if($created) {
            return redirect()->route('adminDisplayBanners');
        } else {
            return 'Banners was not created';
        }
    }

    public function deleteBanners($id) {
        $product = Banner::find($id);
        $exists = Storage::disk('local')->exists('public/product_image/'.$product->image);

        if($exists) {
            Storage::delete('public/banners_images'.$product->image);
        }

        Banner::destroy($id);

        return redirect()->route('adminDisplayBanners');
    }
}
