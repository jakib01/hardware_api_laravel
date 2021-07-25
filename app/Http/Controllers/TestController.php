<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function state()
    {
        $data = DB::table('data')
            ->select('state')
            ->latest('state')
            ->first();
        // $data = response()->json($data);
        // return $data;
        return $data->state;
    }


    public function store(Request $request)
    {
        DB::table('data')
            ->where('id', 1)
            ->update(['state' => $request->state]);
    
        // return $request->state;
    }
}
