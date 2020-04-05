<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AdminProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.displayProducts', ['products' => $products]);
    }

    //Display edit product form
    public function editProductForm($id)
    {
        $product = Product::find($id);
        return view('admin.editProductForm', ['product' => $product]);
    }
    //Display edit product image
    public function editProductImageForm($id)
    {
        $product = Product::find($id);
        return view('admin.editProductImageForm', ['product' => $product]);
    }

    public function updateProductImage(Request $request, $id)
    {
        Validator::make( $request->all(), ['image' => 'max:5000'])->validate();

        if($request->hasFile('image')) {
            $product = Product::find($id);
            $exists =  Storage::disk('local')->exists('public/product_images' . $product->image);

            //delete old image
            if($exists) {
                Storage::delete('public/product_images' . $product->image);
            }

            $ext = $request->file('image')->getClientOriginalExtension();

            $request->image->storeAs('public/product_images/', $product->image);

            $arrToUpdate = array('image' => $product->image);


            DB::table('products')->where('id', $id)->update($arrToUpdate);
            dump($arrToUpdate);
            dump( DB::table('products')->where('id', $id)->update($arrToUpdate));

            return redirect()->route('adminDisplayProducts');

        } else {
           $error = 'no image was selected';
           return $error;
        }
    }
}
