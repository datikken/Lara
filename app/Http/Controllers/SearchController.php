<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $payload = $request->payload;
        $arr = array('-', ',', '/', '.', ')', '(', '№');
        $newphrase = str_replace($arr, ' ', $payload);

        $prd = Product::search($newphrase)->get();

        $flows = array();
        $lasers = array();
        $matrix = array();

        $arrOfArrays = array(
            $flows, $lasers, $matrix
        );

        function pushToArr($obj) {
            $arr = new \stdClass();

            foreach ($obj as $a=>$b) {
                $arr->brand = $a;
                $arr->model = $b;
            }

            return $arr;
        }

        foreach ($prd as $p) {
            $params = json_decode($p->params);

            $flowVal = stripos($params->printertype, 'струйный');
            $lasVal = stripos($params->printertype, 'лазерный');
            $mtrxVal = stripos($params->printertype, 'матричный');

            $newParams = array('');

            foreach (json_decode($p['cape']) as $key=>$item) {
                $ret = pushToArr($item);
                array_push($newParams, $ret);
            }

            $merged = array();

            foreach ($newParams as $key=>$prm) {
                if($prm != '') {
                    if(isset($merged[$prm->brand])) {
                        $merged[$prm->brand] = $merged[$prm->brand] . ', ' . $prm->model;
                    } else {
                        $merged[$prm->brand] = $prm->model;
                    }
                }
            }

            $p['cape'] = $merged;

            if($flowVal != false) {
                array_push($arrOfArrays[0], $p);
            }

            if($lasVal != false) {
                array_push($arrOfArrays[1], $p);
            }

            if($mtrxVal != false) {
                array_push($arrOfArrays[2], $p);
            }
        }

        return response()->json($arrOfArrays);
    }

    public function testSearch()
    {
        //Длина 335 M3550idn
        $prd = Product::search('1005')->get();


        return response()->json($prd);
    }
}

//        function separate(prod) {
//            if (prod.params.printertype === "Принтер струйный") {
//                arrOfArrays[0].push(prod)
//            }
//            if (prod.params.printertype === "Принтер лазерный") {
//                arrOfArrays[1].push(prod)
//            }
//            if (prod.params.printertype === "Принтер матричный") {
//                arrOfArrays[2].push(prod)
//            }
//        }
//
