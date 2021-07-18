<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function state()
    {
        $data = DB::table('data')
            ->select('state')->latest('state')->first();
        $data2= response()->json($data);
        $data2 = json_decode($data2, TRUE);
        return $data2;

    }


    public function store(Request $request)
    {
        DB::table('data')
            ->where('id', 1)
            ->update(['state' => $request->state]);

    }
}
