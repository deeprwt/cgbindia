<?php

namespace App\Http\Controllers;

use App\Models\IsfoStudent;
use App\Models\PractiseTest;
use App\Models\PractiseTestResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PractiseTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function validateUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            '*' => 'required',
           ]);
           if($validator->fails()){
               return back()->with('error','something went Wrong : code 1');
           }

           

           $users = IsfoStudent::where('roll_no',$request->user)->first();
          // return $users;
          
           if(!$users){
            return back()->with('error','something went Wrong : code 2');
           }
           $dataentry = array(
               'student_id'=>$request->user,
                'subject'=>$request->subject,
                'status'=>0,
           );
           $createEntry = DB::table('practise_tests_attempt')->insert($dataentry);
           if(!$createEntry){
            return back()->with('error','something went Wrong with this subject');
           }
           return view('student.pages.showQuestion')->with('subject',$request->subject)->with('user',$request->user);
    }

    public function ShowTest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            '*' => 'required',
           ]);
           if($validator->fails()){
               return back()->with('error','something went Wrong : code 1');
           }

           $users = IsfoStudent::where('roll_no',$request->user)->first();
          // return $users;
          
           if(!$users){
            return back()->with('error','something went Wrong : code 2');
           }
           //return $users->grade;
           $validateSubject =  DB::table('isfo_students_subjects')->where([
               ['roll_no',$request->user],
               ['subject',$request->subject],
           ])->count();
           if($validateSubject == 0){
            return back()->with('error','something went Wrong : code 3');
           }

           $fetchQuestion = DB::table('_question_master')
                                
                                ->leftJoin('_answer_master', '_answer_master.questionid', '=', '_question_master.id')
                                ->where([
                                    ['_question_master.grade',$users->class],
                                    ['_question_master.subject',$request->subject]
                                ])
                                ->get();
                              
          
            foreach($fetchQuestion as $item){
                $question[] = array(
                    'qid'=>$item->questionid,
                    'grade'=>$item->grade,
                    'subject'=>$item->subject,
                    'category'=>$item->category,
                    'question'=>$item->question,
                    'opt1'=>$item->option1,
                    'opt2'=>$item->option2,
                    'opt3'=>$item->option3,
                    'opt4'=>$item->option4,
                    
                );
                
            }
            return response()->json($question);
            

    }
    public function getPaperRemainingTime(Request $request)
    {
        if($request->user == ''){
            $time = 'NULL';
            return $time; 
        }
        $ValidateUser = DB::table('practise_test_time_taken')->where('sid',$request->user)->get();
        if(!$ValidateUser){
            $time = "120:01";
            return $time;
        }else{
            foreach($ValidateUser as $item){
                $ti = $item->time;
            }
            $time = $ti;
            return $time;
        }

    }
    public function PractisePaperTime(Request  $request)
    {
        $validator = Validator::make($request->all(), [
            '*' => 'required',
           ]);
           if($validator->fails()){
               $error = array(
                   'error'=>"something went Wrong with details",
               );
               return response()->json($error);
           }
           $ValidateUser = DB::table('practise_test_time_taken')->where('sid',$request->user)->count();
           //return response()->json($ValidateUser);
           if($ValidateUser == 0){
            $data = array(
                'sid'=>$request->user,
                'time'=>$request->time,
                'created_at'=>now(),
            );
            $insertData = DB::table('practise_test_time_taken')->insert($data);
            if(!$insertData){
                $error = array(
                    'error'=>"something went Wrong with creation",
                );
                return response()->json($error);
            }
            //return 'insert';
           }else{
            $updated = array(
                'time'=>$request->time,
                'updated_at'=>now(),
               );
               $updateData = DB::table('practise_test_time_taken')->update($updated);
               if(!$updateData){
                $error = array(
                    'error'=>"something went Wrong with updation",
                );
                return response()->json($error);
               }
            //return 'update';
        }
        $error = array(
            'success'=>"ok",
        );
        return response()->json($error);
          
         
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
        $grade = $request->class;
        if($request->class > 0){
            $grade = '0'.$request->class;
        }

        $user = $request->user;
        if($user == ''){
            return redirect('student/practise-test');
        }
        $timetaken = $request->time;
        if($timetaken == ''){
            return redirect('student/practise-test');
        }
        if($request->subject == ''){
            return redirect('student/practise-test');
        }
        // =========uncomment============
        // $validated = PractiseTestResult::where([['sid',$user],['subject',$request->subject]])->count();
        // if($validated != 0){
        //     return view('student.pages.show-result');  
        // }
        
        $answers = $request->except('_token','time','user','subject','class');
        //return $request->all();

        // =================uncomment===========
        foreach($answers as $key=>$val){ 
            $qid = substr($key,7);
            $checkAnser = DB::table('_question_master')->where('id',$qid)->get();
            foreach($checkAnser as $iitem){
                $answerss = $iitem->answer;
            }
            $an = 'NULL';
            if($val == $answerss){
                $an = 'true';
            }
            else if($val != $answerss){
                $an = 'false';
            }
            $result = array(
                'sid'=>$user,
                'subject'=>$request->subject,
                'timetaken'=>$timetaken,
                'qid'=>$qid,
                'option'=>$val,
                'checkAns'=>$an,
                'event'=>'ISFO2021',
            );
            $insertAnswer = PractiseTestResult::create($result);
            if(!$insertAnswer){
                return redirect('student/practise-test');
            }
        }
        $
       $totalCorrectAnswer = PractiseTestResult::where([
                                                ['sid',$user],
                                                ['subject',$request->subject],
                                                ['checkAns','true']
                                                ])
                                                ->count();
        $totalIncorrectAnswer = PractiseTestResult::where([
                                                    ['sid',$user],
                                                    ['subject',$request->subject],
                                                    ['checkAns','false']
                                                    ])
                                                    ->count();
        $result = array(
            'correct'=>count($correct),
            'incorrect'=>count($incorrect),
            'attempt'=>count($answers),
            'total'=>$TotalQuestions,
            'leave'=>$TotalQuestions-count($answers),
            
        );                                 
    return view('student.pages.show-result')->with('question',$questionAnswer)->with('overview',$result);
//         $TotalQuestions =  DB::table('_question_master')
//         ->select('*')
//         ->where([
//             ['subject',$request->subject],
//             ['grade',$grade],
//         ])
//         ->count();
//         $Ansers  = DB::table('_question_master')
//                     ->select('_question_master.id','_question_master.grade','_question_master.subject','_question_master.category','_question_master.sets','_question_master.question','_question_master.answer','_answer_master.option1','_answer_master.option2','_answer_master.option3','_answer_master.option4')
//                     ->leftJoin('_answer_master', '_answer_master.questionid','=','_question_master.id')
//                     ->where([
//                         ['subject',$request->subject],
//                         ['grade',$grade],
//                     ])
//                     ->get();
//         //return $Ansers;
      
//         foreach($answers as $key=>$val){ 
//             $ans = '';
//             $correctAns = '';
//             foreach($Ansers as $item){
//                 if($item->answer == 'opt1'){
//                     $correctAns = $item->option1;
//                 }
//                 if($item->answer == 'opt2'){
//                     $correctAns = $item->option2;
//                 }
//                 if($item->answer == 'opt3'){
//                     $correctAns = $item->option3;
//                 }
//                 if($item->answer == 'opt4'){
//                     $correctAns = $item->option4;
//                 }


//                 if($val == $item->answer){
//                     // $ans = 'true';
//                     $questionAnswer[] = array(
//                         'qid'=>$item->id,
//                         'category'=>$item->category,
//                         'subject'=>$item->subject,
//                         'grade'=>$item->grade,
//                         'question'=>$item->question,
//                         'answer'=>$correctAns,
//                         'check'=>'correct',
//                     );
//                      //break;
//                  }else if($val  != $item->answer){
                   
//                     $questionAnswer[] = array(
//                         'qid'=>$item->id,
//                         'category'=>$item->category,
//                         'subject'=>$item->subject,
//                         'grade'=>$item->grade,
//                         'question'=>$item->question,
//                         'answer'=>$correctAns,
//                         'check'=>'incorrect',
//                     );
//                      //break;
//                    // $ans = 'false';
//                 }  
//                 else{
//                     $questionAnswer[] = array(
//                         'qid'=>$item->id,
//                         'category'=>$item->category,
//                         'subject'=>$item->subject,
//                         'grade'=>$item->grade,
//                         'question'=>$item->question,
//                         'answer'=>$correctAns,
//                         'check'=>'NULL',
                        
//                     );
                   
//                 }
                  
//             }
//             break;
            
//         }
       
//         $Ansers  = DB::table('_question_master')->get();
//         $correct = array();
//         $incorrect = array();
//         foreach($answers as $key=>$val){ 
         
          
//             foreach($Ansers as $item){
//                 if($val == $item->answer){
//                     $correct[] = true;
//                    break;
//                  }

//                  if($val  != $item->answer){
//                      $incorrect[] = true;
//                      break;
//                  }  
//             }
      
        
//         }


// // return $showAnswer;
//         return view('student.pages.show-result')->with('question',$questionAnswer)->with('overview',$result);
        // return $questionAnswer;
        // return $result;
        

        //   return view('student.pages.show-result');  
    
    
        }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PractiseTest  $practiseTest
     * @return \Illuminate\Http\Response
     */
    public function show(PractiseTest $practiseTest)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PractiseTest  $practiseTest
     * @return \Illuminate\Http\Response
     */
    public function edit(PractiseTest $practiseTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PractiseTest  $practiseTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PractiseTest $practiseTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PractiseTest  $practiseTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PractiseTest $practiseTest)
    {
        //
    }
}
