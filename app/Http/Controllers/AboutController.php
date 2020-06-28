<?php
/**
 * Created by IntelliJ IDEA.
 * User: tikken
 * Date: 3/23/20
 * Time: 9:57 AM
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\About;
use Config;

class AboutController extends Controller
{
    public function index()
    {
        $years = About::all()->sortBy('year')->groupBy('year');

        return view('pages.about', ['years' => $years]);
    }

    public static function getLastYear()
    {
        $years = About::all()->sortBy('year')->groupBy('year');
        $arr = array();

        $iter = 0;
        $len = count($years);

        foreach ($years as $key=>$year) {
            if ($iter == $len - 2) {
                $lastTwo[$key] = $year;
            } else if ($iter == $len - 1) {
                $lastTwo[$key] = $year;
            }
            $iter++;
        }

        arsort($lastTwo);

        return $lastTwo;
    }
}
