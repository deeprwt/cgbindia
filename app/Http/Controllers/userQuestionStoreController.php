<?php

namespace App\Http\Controllers;

use App\Models\userQuestionStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class userQuestionStoreController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            '*'=>'required',
            ]);
            if($validator->fails()){
                return redirect('student/live-test')->with('error','something went wrong || code: 01');
            }
    }

    public function store(Request $request)
    {
        //return $request->all();
        $validator = Validator::make($request->all(), [
            '*'=>'required',
            ]);
            if($validator->fails()){
                return redirect('student/live-test')->with('error','something went wrong || code: 01');
            }
            $user = $request->user;
            $sub = $request->subject;
            if($sub == 'Mathematics'){
                $sub = 'Maths';
            }
            $opt = $request->choosenOption;
            $qid = $request->qids;
            if(userQuestionStore::QuestionCount($user,$sub,0,$qid) == 0){
                $insert = array(
                    'sid'=>$user,
                    'qid'=>$qid,
                    'subject'=>$sub,
                    'user_option'=>$opt,
                    'status'=>0,
                );
                $ins = userQuestionStore::create($insert);
                if(!$ins){
                    $error = array(
                        'status'=>0,
                        'message'=>'error while store question',
                    );
                    return response()->json($error);
                }
            }
            else{
                $update = array(
                    'user_option'=>$opt,
                );
                $up = userQuestionStore::where([['sid',$user],['qid',$qid],['subject',$sub],['status',0]])->update($update);
                if(!$up){
                    $error = array(
                        'status'=>0,
                        'message'=>'error while store answer ',
                    );
                    return response()->json($error);
                }
            }

    }
}
