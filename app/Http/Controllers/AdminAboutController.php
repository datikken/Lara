<?php
/**
 * Created by IntelliJ IDEA.
 * User: datikken
 * Date: 06.05.2020
 * Time: 22:57
 */

namespace App\Http\Controllers;

use App\About;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAboutController extends Controller
{
    public function index()
    {
        $years = About::paginate(4);
        return view('admin.about.display', ['years' => $years]);
    }

    public function deleteAbout($id)
    {
        $about = About::find($id);
        About::destroy($id);

        return redirect()->route('adminDisplayAbout');
    }

    public function displayCreateAbout()
    {
        return view('admin.about.create');
    }

    public function sendCreateAbout(Request $request)
    {
        $year =  $request->input('year');
        $heading = $request->input('heading');
        $description = $request->input('description');
        $text = $request->input('text');

        $arr = array(
            'year' => $year,
            'heading' => $heading,
            'description' => $description,
            'text' => $text,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => '',
        );

//        $exists = DB::table('abouts')->where('year', $year)->value('year');
//
//        if(is_null($exists)) {
            $created = DB::table('abouts')->insert($arr);
//        }

        return redirect()->route('adminDisplayAbout');
    }

    public function createYearToDescribe(Request $request)
    {
        Validator::make( $request->all(), [
            'year' => 'numeric',
        ])->validate();

        $arr = array(
            'year' => $request->year,
            'created_at' => \Carbon\Carbon::now()
        );

        $exists = DB::table('abouts_years')->where('year', $request->year)->value('year');

        if(!$exists) {
            DB::table('abouts_years')->insert($arr);
            return response()->json($arr);
        } else {
            return response()->json(array('status' => false, 'message' => 'Year is already created'));
        }
    }
}
