<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Product_Image;

class AdminProductsController extends Controller
{
    public function index()
    {
        $products = Product::paginate(3);

        foreach ($products as $product) {
            $product['image'] = DB::table('product_images')->where('product_id', $product['id'])->value('image');
        }

        if (!Auth::check()) {
            return redirect()->route('home');
        } else {
            return view('admin.displayProducts', ['products' => $products]);
        }
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

            $name = DB::table('product_images')->where('product_id', 46)->value('image');

            //delete old image
            if($exists) {
                Storage::delete('public/product_images' . $name);
            }

            $ext = $request->file('image')->getClientOriginalExtension();

            $newStr = explode(".", $name);
            $name = $newStr[0] . '.' . $ext;

            $request->image->storeAs('public/product_images/', $name);

            $arrToUpdate = array('image' => $name);
            DB::table('product_images')->where('product_id', $id)->update($arrToUpdate);

            return redirect()->route('adminDisplayProducts');

        } else {
           $error = 'no image was selected';
           return $error;
        }
    }

    public function updateProduct(Request $request, $id)
    {
        $name = $request->input('name');
        $type = $request->input('type');
        $price = preg_replace('/[^0-9.]/', '', $request->input('price'));

        $updateArr = array('name' => $name, 'type' => $type, 'price' => $price);

        DB::table('products')->where('id', $id)->update($updateArr);

        return redirect()->route('adminDisplayProducts');
    }

    public function createProductForm()
    {
        return view('admin.createProduct');
    }

    public function sendCreateProductForm(Request $request)
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
        Storage::disk('local')->put('public/product_images/' . $imageName, $imageEncoded);

        $newProductArray = array(
            'name' => $name,
            'description' => $description,
            'type' => $type,
            'price' => $price,
            'category' => $category,
            'created_at' => date('Y-m-d H:i:s')
        );

        $created = DB::table('products')->insert($newProductArray);

        //Adding product images
        $product_id =  DB::table('products')->where('name', $name)->value('id');
        $imgArr = array(
            'image' => $imageName,
            'product_id' => $product_id
        );

        $created_img = DB::table('product_images')->insert($imgArr);

        if($created) {
            return redirect()->route('adminDisplayProducts');
        } else {
            return 'Product was not created';
        }
    }

    public function deleteProduct($id) {
        $product = Product::find($id);
        $exists = Storage::disk('local')->exists('public/product_image/'.$product->image);

        if($exists) {
            Storage::delete('public/product_images'.$product->image);
        }

        Product::destroy($id);

        return redirect()->route('adminDisplayProducts');
    }
}
