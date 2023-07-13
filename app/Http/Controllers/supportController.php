<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class supportController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            '*' => 'required',
           ]);
           if($validator->fails()){
               return back()->withInput()->withErrors($validator);
           }
           $check =  DB::table('isfo_support')->where([
               ['sid',Auth::guard('student')->User()->roll_no],
               [ 'subject',$request->subject],
               ['query_type',$request->type]
           ])
           ->count();
           if($check > 0){
               return back()->with('warning','Your query already exists');
           }
           $data = array(
               'sid'=>Auth::guard('student')->User()->roll_no,
               'subject'=>$request->subject,
               'query_type'=>$request->type,
               'descritption'=>$request->descritption,
               'status'=>0,
               'created_at'=>now(),
           );

           $insert = DB::table('isfo_support')->insert($data);
           if(!$insert){
               return back()->with('error','Something went wrong');
           }
           return back()->with('success','your query has been registered successfully');
    }
}
