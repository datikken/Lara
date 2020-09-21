<?php
/**
 * Created by IntelliJ IDEA.
 * User: tikken
 * Date: 3/23/20
 * Time: 4:11 PM
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index()
    {
        return view('pages.landings.landing');
    }

    public function second()
    {
        $feeds = DB::table('product_feedback')->where('product_id', 'easyprint')->get();
        $product = array('product', 'feedback' => $feeds);

        return view('pages.landings.landingt2', ['product' =>  $product]);
    }
}
