<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mainController extends Controller
{
    public function getState()
    {
        $state = DB::table('states')->get();
        return view('registration.school')->with('state',$state);
       // return response()->json($state);
    }
    public function getCity(Request $request)
    {
        $id = $request->id;
        $fetch = DB::table('city')->where('state_id',$id)->get();
        return response()->json($fetch);
    }
}
