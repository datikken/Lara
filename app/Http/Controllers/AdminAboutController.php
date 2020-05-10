<?php
/**
 * Created by IntelliJ IDEA.
 * User: datikken
 * Date: 06.05.2020
 * Time: 22:57
 */

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAboutController extends Controller
{
    public function index()
    {
        $years = About::all();
        return view('admin.about.display', ['years' => $years]);
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

        $exists = DB::table('abouts')->where('year', $year)->value('year');

        if(is_null($exists)) {
            $created = DB::table('abouts')->insert($arr);
        }

        return redirect()->route('adminDisplayAbout');
    }
}
