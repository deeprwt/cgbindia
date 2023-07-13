<?php

namespace App\Http\Controllers;

use App\Models\FinalResult;
use App\Models\IsfoStudent;
use App\Models\QuestionMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class sprContoller extends Controller
{
    public function getSubject()
    {
        $id = Auth::guard('student')->User()->roll_no;
        $getSubject = DB::table('isfo_students_subjects')->where('roll_no',$id)->get();
        if(!$getSubject){
            return back()->with('error','No subject Found');
        }
        return view('student.pages.finalResult')->with('subject',$getSubject);
    }
    public function getResult(Request $request)
    {
        set_time_limit(0);
        
        $validator = Validator::make($request->all(), [
        '*' => 'required',
        ]);
       if($validator->fails()){
           return back()->withInput()->withErrors($validator);
       }
    if($request->subject == 'Mathematics') {
        $subject = 'Maths';
    }      else{
        $subject = $request->subject;
    }
        


          //$final = array($array,$result,$cate,$returnTime);
         // return view('student.pages.show-result')->with('details',$details)->with('result',$result)->with('topicwise',$topicwise)->with('accuracy',$accuracy)->with('comparative',$comparative)->with('performance',$performance)->with('time',$returnTime);  
            
}
}
