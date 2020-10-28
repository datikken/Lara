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

        foreach($yearsContent as $ind=>$yearCont) {
            $newYear = DB::table('abouts_years')->where('id', $yearCont['year'])->first();
            if(is_array($yearCont)) {
                $yearCont['year'] = $newYear->year;
            }
        }

        return view('admin.about.display', ['years' => $yearsContent]);
    }

    public function getTwoYearsInfoBySelect(Request $request)
    {
        $incomeYear = $request->year;
        $years = DB::table('abouts_years')->get();

        $lastTwoYears = array();

        foreach($years as $key=>$year) {
            if($year->year === $incomeYear) {
                // dump($year, $years[$key + 1]);

                $requestedYearId = $year->id;
                $prevRequestedYearId = $years[$key+1]->id;

                $requestedContent = DB::table('abouts')->where('year', $requestedYearId)->get();
                $preRequestedContent = DB::table('abouts')->where('year', $prevRequestedYearId)->get();

                $reqYear = array(
                    'year' => $year,
                    'year_contents' => $requestedContent
                );

                $prevReqYear = array(
                    'year' => $years[$key+1],
                    'year_contents' => $preRequestedContent
                );

                array_push($lastTwoYears, $reqYear, $prevReqYear);
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
        Validator::make( $request->all(), [
            'year' => 'numeric',
            'heading' => 'required',
            'description' => 'required',
            'text' => 'required'
        ])->validate();

        $year =  $request->get('year');
        $heading = $request->input('heading');
        $description = $request->input('description');
        $text = $request->input('text');

        $year_id = DB::table('abouts_years')->where('year', $year)->value('id');
        $exists = DB::table('abouts')->where('year', $year)->value('year');

        $arr = array(
            'year' => $year_id,
            'heading' => $heading,
            'description' => $description,
            'text' => $text,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => '',
        );

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

        $exists = DB::table('abouts_years')->where('year', $request->year)->value('year');

        $arr = array(
            'year' => $request->year,
            'created_at' => \Carbon\Carbon::now()
        );

        if(!$exists) {
            DB::table('abouts_years')->insert($arr);
            return response()->json($arr);
        } else {
            return response()->json(array('status' => false, 'message' => 'Year is already created'));
        }
    }
}
