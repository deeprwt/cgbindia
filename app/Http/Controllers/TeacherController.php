<?php

namespace App\Http\Controllers;

use App\Models\IsfoStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
   public function AddStudents(Request $request)
   {
   
       $error = array();

      if($request->name == '' && $request->email == '' && $request->phone == '' && $request->class == ''){
        return $error[] = [
            'error'=>'All Input required',
           ];
      }
      if(strlen($request->phone) != 10){
          return $error[] = [
              'error'=>'10 digit phone number required',
          ];
      }
       if($request->code == ''){
           
           return $error[] = [
            'error'=>'school code error',
           ];
       }
      if( IsfoStudent::where('email',$request->email)->count() == 1){
          return $error[] = [
              'error'=>$request->email.' is already registred',
          ];
      }
      $roll_no = 'ISFO2021'.IsfoStudent::getRow();
      $password = Hash::make('eupheus');
      if($password == ''){
        return $error[] = [
            'error'=>'something went wrong',
        ];
      }
       $createStu = array(
           'name'=>$request->name,
           'roll_no'=>$roll_no,
           'password'=>$password,
           'class'=>$request->class,
           'email'=>$request->email,
           'phone'=>$request->phone,
           'event'=>'ISFO2021',
           'created_by'=>$request->code,
           'created_at'=>now(),
       );
       $insertStudent = IsfoStudent::create($createStu);
       if(!$insertStudent){
           return $error[] = [
               'error'=>'something went wrong while create student',
           ];
       }
       foreach($request->subject as $item){
           $sub = array(
               'roll_no'=>$roll_no,
               'subject'=>$item,
               'event'=>'ISFO2021',
               'created_at'=>now(),
           );
           $insertSubject = DB::table('isfo_students_subjects')->insert($sub);
           if(!$insertStudent){
            return $error[] = [
                'error'=>'something went wrong while adding subject',
            ];
           }
          
       }
       return $error[] = [
        'success'=>'done ',
    ];
   }

   public function RegisteredStudent(Request $request)
   {
        $code = $request->code;
        $get = DB::table('isfo_students')->where('created_by',$request->code)->get();
        return $get;
   }
}
