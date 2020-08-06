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
        $yearsContent = About::paginate(4);
        $years = DB::table('abouts_years')->get();

        foreach($yearsContent as $ind=>$yearCont) {
            $newYear = DB::table('abouts_years')->where('id', $yearCont['year'])->first();
            $yearCont['year'] = $newYear->year;
        }

        return view('admin.about.display', ['years' => $yearsContent]);
    }

    public function getTwoYearsInfoBySelect(Request $request)
    {
        $incomeYear = $request->year;
        $allContent = DB::table('abouts')->get();
        $years = DB::table('abouts_years')->get();

        $lastTwoYears = array();

        foreach($years as $key=>$year) {
            if($year->year === $incomeYear) {
                // dump($year, $years[$key + 1]);
                array_push($lastTwoYears, $year, $years[$key+1]);
            }
        }

        return response()->json($lastTwoYears);
    }

    public function getAboutYears()
    {
        $years = DB::table('abouts_years')->get();
        $yearsArr = array();

        foreach($years as $key=>$year) {
            $yearsArr[$key] = $year->year;
        }

        return response()->json(array_reverse($yearsArr));
    }

    public function deleteAbout($id)
    {
        $about = About::find($id);
        About::destroy($id);

        return redirect()->route('adminDisplayAbout');
    }

    public function displayCreateAbout()
    {
        $yearsCreated = DB::table('abouts_years')->get();

        return view('admin.about.create',['years' => $yearsCreated]);
    }

    public function sendCreateAbout(Request $request)
    {
        $year =  $request->get('year');

        $heading = $request->input('heading');
        $description = $request->input('description');
        $text = $request->input('text');
        $year_id = DB::table('abouts_years')->where('year', $year)->value('id');

        $arr = array(
            'year' => $year_id,
            'heading' => $heading,
            'description' => $description,
            'text' => $text,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => '',
        );

        $exists = DB::table('abouts')->where('year', $year)->value('year');

        if(!$exists) {
            $created = DB::table('abouts')->insert($arr);
        }

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
