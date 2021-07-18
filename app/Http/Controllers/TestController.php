<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function send(Request $request)
    {
//        dd($request->all());
//        if ($request->state === '1') {
//            $data = $request->state;
//            return $data;
//        } else {
//            $data = $request->state;
//            return $data;
//        }

                $data = DB::table('data')
                ->select('state')->latest('state')->first();
                $data2= response()->json($data);
                $data2 = json_decode($data2, TRUE);
                return $data2;

    }
}
