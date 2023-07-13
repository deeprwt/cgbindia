<?php

namespace App\Http\Controllers;

use App\Models\IsfoStudent;
use App\Models\PractiseTest;
use App\Models\PractiseTestResult;
use App\Models\QuestionMaster;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        //    $validateUsertest = PractiseTestResult::where([
        //                                             ['sid',$request->user],
        //                                             ['subject',$request->subject],
        //                                         ])
        //                                         ->count();
        //     if($validateUsertest != 0){
        //         return redirect('student/practise-test');
        //     }

           

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
           if($request->subject == 'Mathematics'){
               $subject = 'Maths';
           }else{
               $subject = $request->subject;
           }

           $validateTest = PractiseTestResult::where([['sid',$request->user],['subject',$subject]])->count();
           if($validateTest != 0){
               // $Delete = PractiseTestResult::where([['sid',$user],['subject',$request->subject]])->delete();
               // if(!$Delete){
               //     return redirect('student/practise-test');
               // }  
               $error = array(
                   ['error'=>'1',
                   'message'=>'practise-test'],
               );
              // return redirect('student/practise-test');
              return response()->json($error);
           }

           $fetchQuestion = DB::table('_question_master')
                                
                                ->leftJoin('_answer_master', '_answer_master.questionid', '=', '_question_master.id')
                                ->leftJoin('category_masters','category_masters.category','=','_question_master.category')
                                ->where([
                                    ['_question_master.grade',$users->class],
                                    ['_question_master.subject',$subject],
                                    ['_question_master.sets','set1'],
                                ])
                                ->orderBy('orders', 'ASC')
                                ->orderBy('_question_master.id', 'ASC')
                                ->get();
                              
          
            foreach($fetchQuestion as $item){
                if($item->category == 'BrainBox'){
                    $cat = chunk_split($item->category, 5, ' ');
                }else{
                    $cat = $item->category;
                }
                $question[] = array(
                    'qid'=>$item->questionid,
                    'grade'=>$item->grade,
                    'subject'=>$item->subject,
                    'category'=>$cat,
                    'question'=>$item->question,
                    'opt1'=>$item->option1,
                    'opt2'=>$item->option2,
                    'opt3'=>$item->option3,
                    'opt4'=>$item->option4,
                    
                );
                
            }
            return response()->json($question);
            

    }
    public function testQuestionOrder()
    {
       
        $fetchQuestion = DB::table('_question_master')
                             
                             ->leftJoin('_answer_master', '_answer_master.questionid', '=', '_question_master.id')
                             ->leftJoin('category_masters','category_masters.category','=','_question_master.category')
                             ->where([
                                 ['_question_master.grade','06'],
                                 ['_question_master.subject','Science'],
                                 ['_question_master.sets','set1'],
                             ])
                             ->orderBy('orders', 'ASC')
                             ->get();
                           
       
         foreach($fetchQuestion as $item){
            if($item->category == 'BrainBox'){
                $cat = chunk_split($item->category, 5, ' ');
            }else{
                $cat = $item->category;
            }
             $question[] = array(
                //  'qid'=>$item->questionid,
                //  'grade'=>$item->grade,
                //  'subject'=>$item->subject,
                //  'category'=>$cat,
                //  'question'=>$item->question,
                //  'opt1'=>$item->option1,
                //  'opt2'=>$item->option2,
                //  'opt3'=>$item->option3,
                //  'opt4'=>$item->option4,
                'category'=>$cat,
                 
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
      
        $ValidateUser = DB::table('practise_test_time_taken')->where([
            ['sid',$request->user],
            ['subject',$request->subject],
        ])->count();
        if($ValidateUser == 0){
            $time = "60:01";
            //$time = "00:10";
            return $time;
        }else{
            $ValidateUserss = DB::table('practise_test_time_taken')->where([
                ['sid',$request->user],
                ['subject',$request->subject],
            ])->get();
            if(!$ValidateUserss){
                $error = 'error';
                return $error;
            }
            foreach($ValidateUserss as $item){
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
           $ValidateUser = DB::table('practise_test_time_taken')->where([
               ['sid',$request->user],
               ['subject',$request->subject],
           ])->count();
           //return response()->json($ValidateUser);
           if($ValidateUser == 0){
            $data = array(
                'sid'=>$request->user,
                'time'=>$request->time,
                'subject'=>$request->subject,
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
               $updateData = DB::table('practise_test_time_taken')->where([
                ['sid',$request->user],
                ['subject',$request->subject],
            ])->update($updated);
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
    public function testAttempt(Request $request)
    {
        $validator = Validator::make($request->all(), [
            '*' => 'required',
           ]);
           if($validator->fails()){
               $error = array(
                   'error'=>"Something went wrong | code:01",
               );
               return response()->json($error);
           }
          
    
            $user = $request->user;
            if($user == ''){
                return redirect('student/practise-test');
            }
            if($request->subject == 'Mathematics'){
                $subject = 'Maths';
            }else{
                $subject = $request->subject;
            }
            $check = DB::table('practise_tests_attempt')->where([['student_id',$user],['subject',$subject]])->count();

            if($check != 0){
                $error = array(
                    ['status'=>'error','sms'=>'practise-test']
                );
                return response()->json($error);
            }
            $error = array(
                ['status'=>'success','sms'=>'success']
            );
            return response()->json($error);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //return $request->all();
        $grade = $request->class;
        if($request->class > 0){
            $grade = '0'.$request->class;
        }
        if($request->class == 10){
            $grade = $request->class;
        }

        $user = $request->user;
        if($user == ''){
            return redirect('student/practise-test');
        }
        
        $timetaken = $request->time;
        if($timetaken == ''){
            $timetaken = '60:01';
        }
        if($request->subject == ''){
            return redirect('student/practise-test');
        }
        if($request->subject == 'Mathematics'){
            $subject = 'Maths';
        }else{
            $subject = $request->subject;
        }
        
        $validateTest = PractiseTestResult::where([['sid',$user],['subject',$subject]])->count();
        if($validateTest != 0){
            // $Delete = PractiseTestResult::where([['sid',$user],['subject',$request->subject]])->delete();
            // if(!$Delete){
            //     return redirect('student/practise-test');
            // }  
            return redirect('student/practise-test');
        }
            $answers = $request->except('_token','time','user','subject','class');

            foreach($answers as $key=>$val){ 
               $qid = substr($key,7);
               $checkAnswer = QuestionMaster::where('id',$qid)->first();
                if($checkAnswer->answer == $val){
                    $answer = 'true';
                }else{
                    $answer = 'false';
                }
               $result = array(
                   'sid'=>$user,
                   'subject'=>$subject,
                   'qid'=>$qid,
                   'option'=>$val,
                   'checkAns'=>$answer,
                   'cate'=>$checkAnswer->category,
                   'timetaken'=>$timetaken,
                   'event'=>'ISFO2021',
               );
               $insertAnswer = PractiseTestResult::create($result);
               if(!$insertAnswer){
                   return redirect('student/practise-test');
               }
            }

          
           
            $totalTime = '';
            $Checktotaltime  = DB::table('practise_test_time_taken')->where([
                      ['sid',$user],
                        ['subject',$subject],
                           ])->latest()->first();  
            if(!$Checktotaltime){
                $chkTime = "60:01";
            }else{
                $chkTime = $Checktotaltime->time;
            }
            if($timetaken == ''){
                $times = "60:01";
            }else{

            }
            $times = "60:01";
            $submittingTime =  $chkTime;
            $times = Str::replace(':', '.', $times);
            $submittingTime = Str::replace(':', '.', $submittingTime);
            $returnTime  =  floatval($times) - floatval($submittingTime);
            $returnTime = Str::replace('.', ':', $returnTime);
            //return $returnTime;

        $TotalQuestions =  DB::table('_question_master')
        ->select('*')
        ->where([
            ['subject',$subject],
            ['grade',$grade],
            ['sets','set1'],
        ])
        ->count();
           // return $grade;
        $Ansers  = DB::table('_question_master')
                    ->select('_question_master.id','_question_master.grade','_question_master.subject','_question_master.category','_question_master.sets','_question_master.question','_question_master.answer','_answer_master.option1','_answer_master.option2','_answer_master.option3','_answer_master.option4')
                    ->leftJoin('_answer_master', '_answer_master.questionid','=','_question_master.id')
                    ->where([
                        ['subject',$subject],
                        ['grade',$grade],
                        ['sets','set1'],
                    ])
                    ->get();
                   // return $Ansers;
                 
       foreach($Ansers as $item ){
        $correctAns = '';
           
        if($item->answer == 'opt1'){
            $correctAns = $item->option1;
        }
        if($item->answer == 'opt2'){
            $correctAns = $item->option2;
        }
        if($item->answer == 'opt3'){
            $correctAns = $item->option3;
        }
        if($item->answer == 'opt4'){
            $correctAns = $item->option4;
        }
        // print_r($user);
        // print_r($item->id);
     
        $getCheck = PractiseTestResult::select('*')->where([
            ['sid',$user],
            ['qid',$item->id],
            ['subject',$subject],
        ])->count();
        // $ar = 'tt';
        // return $ar;
        // return $getCheck;
        // die();
   // return $getCheck; 
 //   die;
        //$array[] = $getCheck;
            // foreach($getCheck as $it){
            //     $its = $it->checkAns;
            // }
         //   print_r($getCheck);
        if($getCheck == 0){

           
           
            $cateid[] = array(
                'id'=>$item->category,
                'status'=>'null',
            );
            $array[] = array(
                'qid'=>$item->id,
                'category'=>$item->category,
              
                'grade'=>$item->grade,
                'question'=>$item->question,
                'answer'=>$correctAns,
                'check'=>'null',
            );  
        }else{
            
            $getCheck = PractiseTestResult::select('*')->where([
                ['sid',$user],
                ['qid',$item->id],
                ['subject',$subject],
            ])->first();

           // return $getCheck;
           
 
             if($getCheck->checkAns == 'false'){
                $cateid[] = array(
                    'id'=>$item->category,
                    'status'=>'false',
                );
                $array[] = array(
                    'qid'=>$item->id,
                    'category'=>$item->category,

                    'grade'=>$item->grade,
                    'question'=>$item->question,
                    'answer'=>$correctAns,
                    'check'=>'incorrect',
                );  
                
               
               
            }else{ 
                $cateid[] = array(
                    'id'=>$item->category,
                    'status'=>'true',
                );
                $array[] = array(
                    'qid'=>$item->id,
                    'category'=>$item->category,

                    'grade'=>$item->grade,
                    'question'=>$item->question,
                    'answer'=>$correctAns,
                    'check'=>'correct',
                ); 
               
               
            }
        }    
       }
       
       $countCorrect = PractiseTestResult::where([['sid',$user],['checkAns','true'],['subject',$subject]])->count();
       $countInCorrect = PractiseTestResult::where([['sid',$user],['checkAns','false'],['subject',$subject]])->count();
    
       $result = array(
           'correct'=>$countCorrect,
           'incorrect'=>$countInCorrect,
           'attempt'=>count($answers),
           'total'=>$TotalQuestions,
           'leave'=>$TotalQuestions-count($answers),
           
       );
       $findCate = QuestionMaster::select('_question_master.category')
                                ->leftJoin('category_masters','category_masters.category','=','_question_master.category')
                                ->orderBy('orders','ASC')
                                ->where([['subject',$subject],['grade',$grade],['sets','set1']])
                                ->groupBy('_question_master.category')->get();
                                $tot = 0;
      foreach($findCate as $find){
          foreach($cateid as $cat){
              if($cat['id'] == $find->category){
                $findTotal = QuestionMaster::where([
                    ['subject',$subject],
                    ['grade',$grade],
                    ['category',$find->category]
                ])
                ->count();
                $findCorrect = PractiseTestResult::where([
                    ['subject',$subject],
                    ['sid',$user],
                    ['cate',$find->category],
                    ['checkAns','true']
                ])->count();
                $findInCorrect = PractiseTestResult::where([
                    ['subject',$subject],
                    ['sid',$user],
                    ['cate',$find->category],
                    ['checkAns','false']
                ])->count();
                 $cate[] = array(
                     'id'=>$find->category,
                     'total'=>$findTotal,
                     'correct'=>$findCorrect,
                     'incorrect'=>$findInCorrect,
                     'null'=>$findTotal-($findInCorrect+$findCorrect),
                 );
                 break;
              }
              
          }
      }
    //  $res = array($array,$result,$cate,$returnTime);
    //  return response()->json($res);
      return view('student.pages.show-result')->with('question',$array)->with('overview',$result)->with('accuracy',$accuracy)->with('performance',$performance)->with('comparative',$comparative)->with('time',$returnTime);  
           
}

public function getPractiseResult(Request $request)
{
        set_time_limit(0);

        $validator = Validator::make($request->all(), [
        '*' => 'required',
       ]);
       if($validator->fails()){
           $error = array(
               'error'=>"Something went wrong | code:01",
           );
           return response()->json($error);
       }
        $grade = $request->class;
        if($request->class != 10){
            $grade = '0'.$request->class;
        }

        $user = $request->user;
        if($user == ''){
            return redirect('student/practise-test');
        }
        $subject = $request->subject;
        if($request->subject == 'Mathematics'){
            $subject = 'Maths';
        }else{
            $subject = $request->subject;
        }
      //return $subject;
        $answers = PractiseTestResult::where([
            ['sid',$user],
            ['subject',$subject],
        ])
        ->get();
        //return $answers;
        $Checktotaltime  = DB::table('practise_test_time_taken')->where([
            ['sid',$user],
            ['subject',$request->subject],
           ])->latest()->first();

           if(!$Checktotaltime){
            $error = array(
                'error'=>'something went wrong | code:2',
            );
            return response()->json($error);
            }
            $times = "60:01";
            $chkTime = $Checktotaltime->time;
            $times = Str::replace(':', '.', $times);
            $chkTime = Str::replace(':', '.', $chkTime);
            $returnTime  =  floatval($times) - floatval($chkTime);
            $returnTime = Str::replace('.', ':', $returnTime);
            $TotalQuestions =  DB::table('_question_master')
            ->select('*')
            ->where([
                ['subject',$subject],
                ['grade',$grade],
                ['sets','set1']
            ])
            ->count();
          
            $Ansers  = DB::table('_question_master')
                        ->select('_question_master.id','_question_master.grade','_question_master.subject','_question_master.category','_question_master.sets','_question_master.question','_question_master.answer','_answer_master.option1','_answer_master.option2','_answer_master.option3','_answer_master.option4')
                        ->leftJoin('_answer_master', '_answer_master.questionid','=','_question_master.id')
                        ->where([
                            ['subject',$subject],
                            ['grade',$grade],
                            ['_question_master.sets','set1']
                        ])
                        ->get();
                  //  return $Ansers;
           foreach($Ansers as $item ){
            $correctAns = '';
               
            if($item->answer == 'opt1'){
                $correctAns = $item->option1;
            }
            if($item->answer == 'opt2'){
                $correctAns = $item->option2;
            }
            if($item->answer == 'opt3'){
                $correctAns = $item->option3;
            }
            if($item->answer == 'opt4'){
                $correctAns = $item->option4;
            }
         
            $getCheck = PractiseTestResult::select('*')->where([
                ['sid',$user],
                ['qid',$item->id],
                ['subject',$subject],
            ])->count();
            
                
            //$array[] = $getCheck;
                // foreach($getCheck as $it){
                //     $its = $it->checkAns;
                // }
                
            if($getCheck == 0){
    
               
               
                $cateid[] = array(
                    'id'=>$item->category,
                    'status'=>'null',
                );
                $array[] = array(
                    'qid'=>$item->id,
                    'category'=>$item->category,
                  
                    'grade'=>$item->grade,
                    'question'=>$item->question,
                    'answer'=>$correctAns,
                    'check'=>'null',
                );  
            }else{
                
                $getCheck = PractiseTestResult::select('*')->where([
                    ['sid',$user],
                    ['qid',$item->id],
                    ['subject',$subject],
                ])->first();
                //return $getCheck;
               
     
                 if($getCheck->checkAns == 'false'){
                    $cateid[] = array(
                        'id'=>$item->category,
                        'status'=>'false',
                    );
                    $array[] = array(
                        'qid'=>$item->id,
                        'category'=>$item->category,
    
                        'grade'=>$item->grade,
                        'question'=>$item->question,
                        'answer'=>$correctAns,
                        'check'=>'incorrect',
                    );  
                    
                   
                   
                }else{
                    $cateid[] = array(
                        'id'=>$item->category,
                        'status'=>'true',
                    );
                    $array[] = array(
                        'qid'=>$item->id,
                        'category'=>$item->category,
    
                        'grade'=>$item->grade,
                        'question'=>$item->question,
                        'answer'=>$correctAns,
                        'check'=>'correct',
                    ); 
                   
                   
                }
            }    
           }
           
           $countCorrect = PractiseTestResult::where([['sid',$user],['checkAns','true'],['subject',$subject]])->count();
           $countInCorrect = PractiseTestResult::where([['sid',$user],['checkAns','false'],['subject',$subject]])->count();
        
           $details = array(
               'name'=>IsfoStudent::where('roll_no',$request->user)->first()->name,
               'subject'=>$subject,
               'class'=>$grade,
               'rollno'=>$user,
               'school'=>DB::table('school_codes')->where('school_code',IsfoStudent::where('roll_no',$request->user)->first()->school_code)->first()->school_name,
               'held'=>IsfoStudent::where('roll_no',$request->user)->first()->event,
           );
           // $toppercorrect = DB::select("SELECT MAX(correct) as toppercorrect FROM (SELECT r.sid as sid,r.subject as subject,COUNT(*) as correct FROM practice_test_result r,isfo_students s WHERE r.sid=s.roll_no AND checkAns='true' AND s.class=".$grade." AND subject='".$subject."' GROUP BY sid,subject) T GROUP BY subject");
           // $topperincorrect = DB::select("SELECT MAX(incorrect) as topperincorrect FROM (SELECT r.sid as sid,r.subject as subject,COUNT(*) as incorrect FROM practice_test_result r,isfo_students s WHERE r.sid=s.roll_no AND checkAns='false' AND s.class=".$grade." AND subject='".$subject."' GROUP BY sid,subject) T GROUP BY subject");
           $avgcorrect = DB::select("SELECT AVG(correct) as avgcorrect FROM (SELECT r.sid as sid,r.subject as subject,COUNT(*) as correct FROM practice_test_result r,isfo_students s WHERE r.sid=s.roll_no AND checkAns='true' AND s.class=".$grade." AND subject='".$subject."' GROUP BY sid,subject) T GROUP BY subject");
           $avgincorrect = DB::select("SELECT AVG(incorrect) as avgincorrect FROM (SELECT r.sid as sid,r.subject as subject,COUNT(*) as incorrect FROM practice_test_result r,isfo_students s WHERE r.sid=s.roll_no AND checkAns='false' AND s.class=".$grade." AND subject='".$subject."' GROUP BY sid,subject) T GROUP BY subject");
           $accuracy = array(
               'correct'=>$countCorrect,
               'incorrect'=>$countInCorrect,
               'unattempted'=>$TotalQuestions-count($answers),
               // 'toppercorrect'=$toppercorrect[0]->toppercorrect,
               // 'topperincorrect'=>$topperincorrect[0]->topperincorrect,
               // 'topperunattempted'=>$TotalQuestions-$toppercorrect[0]->toppercorrect-$topperincorrect[0]->topperincorrect,
               'avgcorrect'=>$avgcorrect[0]->avgcorrect,
               'avgincorrect'=>$avgincorrect[0]->avgincorrect,
               'avgunattempted'=>$TotalQuestions-$avgcorrect[0]->avgcorrect-$avgincorrect[0]->avgincorrect,
               'total'=>$TotalQuestions,
           );
           $findCate = QuestionMaster::select('_question_master.category')
                                    ->leftJoin('category_masters','category_masters.category','=','_question_master.category')
                                    ->orderBy('orders','ASC')
                                    ->where([['subject',$subject],['grade',$grade],['sets','set1']])
                                    ->groupBy('_question_master.category')->get();
                                    $tot = 0;
          foreach($findCate as $find){
              foreach($cateid as $cat){
                  if($cat['id'] == $find->category){
                    $findTotal = QuestionMaster::where([
                        ['subject',$subject],
                        ['grade',$grade],
                        ['category',$find->category]
                    ])
                    ->count();
                    $findCorrect = PractiseTestResult::where([
                        ['subject',$subject],
                        ['sid',$user],
                        ['cate',$find->category],
                        ['checkAns','true']
                    ])->count();
                    $findInCorrect = PractiseTestResult::where([
                        ['subject',$subject],
                        ['sid',$user],
                        ['cate',$find->category],
                        ['checkAns','false']
                    ])->count();
                    $marking = [
                        '1-3'=>[
                            'Maths'=>[
                                'Mathematical Reasoning'=>1,
                                'Everyday Maths'=>1,
                                'Logical Reasoning'=>1,
                                'BrainBox'=>4],
                            'English'=>[
                                'Vocabulary English'=>1,
                                'Grammar English'=>1,
                                'Reading and Writing English'=>1,
                                'BrainBox'=>4],
                            'Science'=>[
                                'Scientific Reasoning'=>1,
                                'Everyday Science'=>1,
                                'Logical Reasoning'=>1,
                                'BrainBox'=>4],
                            'GK'=>[
                                'General Awareness'=>1,
                                'Current Affairs'=>1,
                                'Building Life Skills'=>1,
                                'BrainBox'=>4],
                            ],
                        '4-8'=>[
                            'Maths'=>[
                                'Mathematical Reasoning'=>2,
                                'Everyday Maths'=>1,
                                'Logical Reasoning'=>2,
                                'BrainBox'=>5],
                            'English'=>[
                                'Vocabulary English'=>2,
                                'Grammar English'=>2,
                                'Reading and Writing English'=>1,
                                'BrainBox'=>5],
                            'Science'=>[
                                'Scientific Reasoning'=>2,
                                'Everyday Science'=>1,
                                'Logical Reasoning'=>2,
                                'BrainBox'=>5],
                            'GK'=>[
                                'General Awareness'=>2,
                                'Current Affairs'=>1,
                                'Building Life Skills'=>1,
                                'BrainBox'=>5]
                            ]
                        ];
                     if($grade<4){
                        $compCorrect = $findCorrect*$marking['1-3'][$subject][$find->category];
                        $compTotal = $findTotal*$marking['1-3'][$subject][$find->category];
                     }
                     else{
                        $compCorrect = $findCorrect*$marking['4-8'][$subject][$find->category];
                        $compTotal = $findTotal*$marking['4-8'][$subject][$find->category];
                     }
                     $compPercentage = round($compCorrect*100/$compTotal,2);

                    if($compPercentage<50)
                        $compDescription = 'Scope for Improvement';
                    else if($compPercentage>=50 && $compPercentage<60)
                        $compDescription = 'Good';
                    else if($compPercentage>=60 && $compPercentage<70)
                        $compDescription = 'Very Good';
                    else if($compPercentage>=70 && $compPercentage<80)
                        $compDescription = 'Excellent';
                    else
                        $compDescription = 'Outstanding';

                     $topicwise[] = array(
                         'category'=>$find->category,
                         'total'=>$compTotal,
                         'correct'=>$compCorrect,
                         'percentage'=>$compPercentage,
                         'description'=>$compDescription,
                         // 'incorrect'=>$findInCorrect,
                         // 'unattempted'=>$findTotal-($findInCorrect+$findCorrect),
                     );
                     $comparative[] = array(
                         'category'=>$find->category,
                         'correct'=>$findCorrect,
                         // 'toppercorrect'=>DB::select("SELECT MAX(correct) as toppercorrect FROM (SELECT r.subject as subject,r.cate as cate,COUNT(*) as correct FROM practice_test_result r,isfo_students s WHERE r.sid=s.roll_no AND r.checkAns='true' AND s.class=".$grade." AND r.subject='".$subject."' AND r.cate='".$find->category."' GROUP BY r.sid,r.subject,r.cate) T GROUP BY subject,cate"),
                         'avgcorrect'=>DB::select("SELECT AVG(correct) as avgcorrect FROM (SELECT r.subject as subject,r.cate as cate,COUNT(*) as correct FROM practice_test_result r,isfo_students s WHERE r.sid=s.roll_no AND r.checkAns='true' AND s.class=".$grade." AND r.subject='".$subject."' AND r.cate='".$find->category."' GROUP BY r.sid,r.subject,r.cate) T GROUP BY subject,cate"),
                          'total'=>$findTotal,
                     );
                     $performance[] = array(
                         'category'=>$find->category,
                         'correct'=>$compCorrect,
                         // 'incorrect'=>$findInCorrect,
                         // 'unattempted'=>$findTotal-($findInCorrect+$findCorrect),
                         // 'total'=>$compTotal,
                     );
                     break;
                  }
                  
              }
          }

          $resTotal = 0;
          $resCorrect = 0;
          for($i=0;$i<count($topicwise);$i++){
            $resTotal+=$topicwise[$i]['total'];
            $resCorrect+=$topicwise[$i]['correct'];
          }

          $result = array(
            'total'=> $resTotal,
            'correct'=> $resCorrect,
            'percentage'=> round($resCorrect*100/$resTotal,2),
            'staterank'=> 'N/A',
            'nationalrank'=> 'N/A',
            'internationalrank'=> 'N/A',
          );

          //$final = array($array,$result,$cate,$returnTime);
          return view('student.pages.show-result')->with('details',$details)->with('result',$result)->with('topicwise',$topicwise)->with('accuracy',$accuracy)->with('comparative',$comparative)->with('performance',$performance)->with('time',$returnTime);  
            
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
