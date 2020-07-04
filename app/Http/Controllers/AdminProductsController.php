<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use stdClass;

class AdminProductsController extends Controller
{
    public function main()
    {
        return view('admin.main');
    }

    public function index()
    {
        $products = Product::paginate(10);

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
    //Display dropzone
    public function dropZoneForm($id)
    {
        $id = Product::find($id)->id;
        return view('admin.productDropZone', ['id' => $id]);
    }

    public function addMultipleProductImages(Request $request, $id)
    {
        if($request->hasFile('file'))
            {
                $product = Product::find($id);
                $ext = $request->file('file')->getClientOriginalExtension();
                $fileName = str_replace(' ', '', $request->file('file')->getClientOriginalName());
                $exists = DB::table('product_images')->where('image', $fileName);

                //TODO: existance check
                $arr = array(
                    'product_id' => $product->id,
                    'image' => $fileName,
                    'created_at' => date('Y-m-d H:i:s')
                );

                DB::table('product_images')->insert($arr);
                $imageEncoded = File::get($request->file('file'));

                Storage::disk('local')->put('public/product_images/'. $fileName, $imageEncoded);
            }
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
                Storage::disk('local')->delete('public/product_images' . $name);
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

        //REDO find method product id
        //Adding product images
        $product_id = DB::table('products')->where('name', $name)->value('id');

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
        $product_img = DB::table('product_images')->where('product_id', $id)->value('image');

        $exists = Storage::disk('local')->exists('public/product_image/' . $product_img);

        if($exists) {
            Storage::disk('local')->delete('public/product_images' . $product_img);
        }

        Product::destroy($id);

        return redirect()->route('adminDisplayProducts');
    }

    public function cleanProductImages($id)
    {
        $files = DB::table('product_images')->where('product_id', $id)->get();

        foreach ($files as $file) {
            $status = Storage::disk('local')->delete( '/public/product_images/' . $file->image);
        }

        $images = DB::table('product_images')->where('product_id', $id)->delete();

        return redirect()->route('dropZoneForm', ['id' => $id]);
    }

    public function fetchProducts(Request $request)
    {
        $client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);

        $response = $client->post('http://93.184.160.194:8085/mainbase/hs/ecom/getitems',
            ['body' => json_encode(
                [
                    'IDToken' => '298095c6-7f9e-11e1-a511-001b214bf52b'
                ]
            )]
        );

        $res = $response->getBody()->getContents();
        $json = json_decode($res);

        foreach ($json as $key=>$value) {
            $product_image = '';

            $arr = [
              'uuid' => isset($value->uuid) ? $value->uuid : json_encode(array()),
              'name' => isset($value->name_buh) ? $value->name_buh :  json_encode(array()),
              'currency_code' => isset($value->currency_code) ? $value->currency_code :  json_encode(array()),
              'params' => isset($value->params) ? json_encode($value->params) :  json_encode(array()),
              'name_econom' => isset($value->name_ecom) ?  json_encode($value->name_ecom) : json_encode(array()),
              'bro_color' => isset($value->bro_color) ? json_encode($value->bro_color) :  json_encode(array()),
              'bro_counter_brand' => isset($value->bro_counter_brand) ? json_encode($value->bro_counter_brand) :  json_encode(array()),
              'price' => isset($value->price) ? $value->price : json_encode(array()),
              'name_buh' => isset($value->name_buh) ? json_encode($value->name_buh) :  json_encode(array()),
              'created_at' => date('Y-m-d H:i:s'),
              'cape' =>  isset($value->cape) ? json_encode($value->cape) : json_encode(array()),
            ];

            if(!empty($value->params)) {
                $data = json_decode(json_encode($value->params));

                foreach ($data as $key=>$value) {
                    if(isset($value->photo)) {
                        $product_image = $value->photo;
                    }
                }
            }

            $exist = DB::table('products')->where('uuid', $arr['uuid'] )->value('uuid');

            if(is_null($exist)) {
                $created = DB::table('products')->insert($arr);
            } else {
                $created = DB::table('products')->where('uuid', $arr['uuid'])->update($arr);
            }

//  save product image

//            if($product_image != '') {
//                $pr_id = DB::table('products')->where('uuid', $arr['uuid'])->value('id');
//
//                $arr = [
//                    'product_id' => $pr_id,
//                    'image' => str_replace(' ', '', $product_image),
//                    'created_at' => Carbon::now()
//                ];
//
//                $existName = DB::table('product_images')->where('product_id', $pr_id)->value('image');
//
//                if($existName == $arr['image']) {
//                    DB::table('product_images')->where('product_id', $pr_id)->where('image', $arr['image'])->update($arr);
//                } else {
//                    DB::table('product_images')->insert($arr);
//                }
//            }
        }

        return redirect('/admin/products');
    }
}
