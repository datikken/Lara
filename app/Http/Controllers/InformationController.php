<?php
/**
 * Created by IntelliJ IDEA.
 * User: tikken
 * Date: 3/23/20
 * Time: 9:15 AM
 */

namespace App\Http\Controllers;
use App\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index()
    {
        $infos = Information::all();

        return view('pages.information',['info' => $infos]);
    }

    public function getAllInformationPosts()
    {
        $infos = Information::all();

        return response()->json($infos);
    }


    public function showOferta()
    {
        return view('pages.oferta');
    }
}
