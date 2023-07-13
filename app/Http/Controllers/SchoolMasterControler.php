<?php

namespace App\Http\Controllers;

use App\Models\SchoolCode;
use App\Models\SchoolMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SchoolMasterControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'school_name'=>'required',
            'state'=>'required',
            'city'=>'required',
            'address'=>'required',
            'pin' => 'required|regex:/[0-9]{6}/', 
            'principle_name'=>'required',
            'principle_phone'=>'required|regex:/[0-9]{10}/',
            'principle_email'=>'required|email',
            'coordinator_name_1'=>'required',
            'coordinator_phone_1'=>'required|regex:/[0-9]{10}/',
            'coordinator_email_1'=>'required|email',
            'sales'=>'required',
            'invitation'=>'required|regex:/[0-9]/',
           ]);
           if($validator->fails()){
               return back()->withInput()->withErrors($validator);
           }    
           if($request->coordinator_name_2 == ''){
               $cname2= 'null';
           }else{
            $cname2= $request->coordinator_name_2;
           }

           if($request->coordinator_phone_2 == ''){
            $cphone2= 'null';
            }else{
                $cphone2= $request->coordinator_phone_2;
            }
            if($request->coordinator_email_2 == ''){
                $cemail2= 'null';
            }else{
                $cemail2= $request->coordinator_email_2;
            }

            $insertArray = array(
                'school_name'=>$request->school_name,
                'state'=>$request->state,
                'city'=>$request->city,
                'address'=>$request->address,
                'pin'=>$request->pin,
                'principle_name'=>$request->principle_name,
                'principle_phone'=>$request->principle_phone,
                'principle_email'=>$request->principle_email,
                'coord1_name'=>$request->coordinator_name_1,
                'coord1_phone'=>$request->coordinator_phone_1,
                'coord1_email'=>$request->coordinator_email_1,
                'coord2_name'=>$cname2,
                'coord2_phone'=>$cphone2,
                'coord2_email'=>$cemail2,
                'sales_rep'=>$request->sales,
                'no_invt_code'=>$request->invitation,
                'email_sent'=>0
            );

            $schoolCode =  SchoolCode::checkCode($request->school_name,$request->state,$request->city);
            if($schoolCode){
                $scode = $schoolCode->school_code;
                $id = 'ok';
            }else{
                $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $scode =  substr(str_shuffle($str), 0, 5);
                $id = 'not';
            }

            

            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchoolMaster  $schoolMaster
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolMaster $schoolMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchoolMaster  $schoolMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolMaster $schoolMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchoolMaster  $schoolMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolMaster $schoolMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchoolMaster  $schoolMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolMaster $schoolMaster)
    {
        //
    }
    
}
