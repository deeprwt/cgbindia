<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;    

class ISFOContactController extends Controller
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
            '*'=>'required',
            'phone'=>'regex:/[0-9]{10}/',
            'email'=>'email',
            ]);
            if($validator->fails()){
                return response()->json($validator->getMessageBag()->toArray());
            }
            $DataArray = array(
                'name'=>$request->name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'Message'=>$request->sms,
                'sentFrom'=>'https://skool.ai/isfo/contact',
                'created_at'=>now(),
            );

            $stuemail ='reenap@eupheus.in';
           
            Mail::send('email.isfoContact', ['data'=>$DataArray], function ($message) use ($stuemail) {
                 
             $message->to($stuemail, '')
                 ->from('donotreply@eupheus.in')
                 ->subject('Enquiry From ISFO Website');
         
         });

            $create = DB::table('isfo_contact')->insert($DataArray);
            if(!$create){
                $error = array(
                    'error'=>'Something went wrong'
                    );
                   return response()->json($error);
            }
            $error = array(
                'success'=>'Your message sent successfully'
                );
               return response()->json($error);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
