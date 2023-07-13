<?php

namespace App\Http\Controllers;

use App\Models\IsfoStudent;
use App\Models\FinalResult;
use App\Models\FinalTimer;
use App\Models\QuestionMaster;
use App\Models\userQuestionStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class livePaper extends Controller
{
    public function index()
    {
        $id = Auth::guard('student')->User()->roll_no;
        $grd = Auth::guard('student')->User()->class;
        if(Auth::guard('student')->User()->status == 2){
            $get = DB::table('isfo_students_subjects')->where([['roll_no',$id],['status',1]])->get();
            $class = '0'.$grd;
              if($grd == 10){
                  $class = $grd;
              }
            foreach($get as $item){
               
                if($item->subject == 'Mathematics'){
                    $subject = 'Maths';
                }else{
                    $subject = $item->subject;
                }
                if($subject == 'Maths'){
                   // $subject = 'maths';
                    $img = 'maths.jpg';
                }
                if($subject == 'Science'){
                  $img = 'science.jpg';
                }
                if($subject == 'English'){
                  $img = 'english.jpg';
                }
                if($subject == 'GK'){
                  $img = 'gk.jpg';
                }
               
                $find = DB::table('study_material_master')->select('book')->where([
                    ['grade',$class],
                    ['subject',$subject],
                ])
                ->first();
              $books = $find->book;
              if($subject == 'Maths'){
                $sub = 'Mathematics';
            }else{
                $sub = $subject;
            }
            $checkStatus = DB::table('final_test_result')->where([['sid',$id],['subject',$subject]])->count();
            if($checkStatus == 0){
                if(userQuestionStore::count($id,$subject,0) == 0){
                    $book[] = [
                        'subject'=> $sub,
                        'book'=>$books,
                        'cover'=>$img,
                        'show'=>0,
                       
                    ];
                  }else{
                    $book[] = [
                        'subject'=> $sub,
                        'book'=>$books,
                        'cover'=>$img,
                        'show'=>1,
                    ];
                  }
                  
            }
             
             
              
            }
            if(isset($book)){
                return view('student.pages.liveTest')->with('book',$book);
            }
            return view('student.pages.liveTest');
           
        }
    }
    // =============================get paper =====================
    public function ValidateStu(Request $request)               
    {
        $validator = Validator::make($request->all(), [
            '*' => 'required',
           ]);
           if($validator->fails()){
             return back()->with('error','Something went wrong || code 1');
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
           return view('student.pages.finalquestion')->with('subject',$request->subject)->with('user',$request->user);
    }
    public function finalQuestions(Request $request)
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
           $checkStatus = DB::table('final_test_result')->where([['sid',$request->user],['subject',$subject]])->count();
           if($checkStatus != 0){
               $error = array(
                   'status'=>3,
                   'message'=>'You already submitted you exam'
               );
               return response()->json($error);
           }
        //    $validateTest = FinalResult::where([['sid',$request->user],['subject',$subject]])->count();
        //    if($validateTest != 0){
        //        // $Delete = FinalResult::where([['sid',$user],['subject',$request->subject]])->delete();
        //        // if(!$Delete){
        //        //     return redirect('student/practise-test');
        //        // }  
        //        $error = array(
        //            ['error'=>'1',
        //            'message'=>'practise-test'],
        //        );
        //       // return redirect('student/practise-test');
        //       return response()->json($error);
        //    }
           
           $fetchQuestion = DB::table('_question_master')
                                
                                ->leftJoin('_answer_master', '_answer_master.questionid', '=', '_question_master.id')
                                ->leftJoin('category_masters','category_masters.category','=','_question_master.category')
                                ->where([
                                    ['_question_master.grade',$users->class],
                                    ['_question_master.subject',$subject],
                                    ['_question_master.sets','set2']
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
                $getUserStoredQuestion = userQuestionStore::select('user_option')->where([['sid',$request->user],['subject',$subject],['status',0],['qid',$item->questionid]])->first();
                if(!$getUserStoredQuestion){
                    $op = 'null';
                }else{
                    $op = $getUserStoredQuestion->user_option;
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
                        'select'=>$op,
                    );
            }
            return response()->json($question);
            

    
    }

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
//return $user;
 if($user == ''){
     return redirect('student/practise-test');
 }
 
 $timetaken = $request->time;
 if($timetaken == ''){
     $timetaken = '60:01';
 }
 //return $request->subject;
 if($request->subject == ''){
     return redirect('student/practise-test');
 }
 if($request->subject == 'Mathematics'){
     $subject = 'Maths';
 }else{
     $subject = $request->subject;
 }



 $validateTest = FinalResult::where([['sid',$user],['subject',$subject]])->count();
//  return $validateTest;
 if($validateTest != 0){
     $Delete = FinalResult::where([['sid',$user],['subject',$subject]])->delete();
     
     if(!$Delete){
         return redirect('student/practise-test');
     }  
     //echo "fi";
  //   return redirect('student/practise-test');
 }
 
     $answers = $request->except('_token','time','user','subject','class');

     foreach($answers as $key=>$val){ 
        $qid = substr($key,7);
        $checkAnswer = QuestionMaster::where([['id',$qid],['sets','set2']])->first();
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
      
        $insertAnswer = FinalResult::create($result);
        if(!$insertAnswer){
            return redirect('student/practise-test');
        }
       
     }
     
   
     return redirect('student/thankyou');
//      $totalTime = '';
//      $Checktotaltime  = FinalTimer::where([
//                ['sid',$user],
//                  ['subject',$subject],
//                     ])->latest()->first();  
//      if(!$Checktotaltime){
//          $chkTime = "60:01";
//      }else{
//          $chkTime = $Checktotaltime->time;
//      }
//      if($timetaken == ''){
//          $times = "60:01";
//      }
//      $times = "60:01";
//      $submittingTime =  $chkTime;
//      $times = Str::replace(':', '.', $times);
//      $submittingTime = Str::replace(':', '.', $submittingTime);
//      $returnTime  =  floatval($times) - floatval($submittingTime);
//      $returnTime = Str::replace('.', ':', $returnTime);
//      //return $returnTime;

//  $TotalQuestions =  DB::table('_question_master')
//  ->select('*')
//  ->where([
//      ['subject',$subject],
//      ['grade',$grade],
//      ['sets','set2'],
//  ])
//  ->count();
//     // return $grade;
//  $Ansers  = DB::table('_question_master')
//              ->join('category_masters','category_masters.category','=','_question_master.category')
            
//              ->select('_question_master.id','_question_master.grade','_question_master.subject','_question_master.category','_question_master.sets','_question_master.question','_question_master.answer','_answer_master.questionid','_answer_master.option1','_answer_master.option2','_answer_master.option3','_answer_master.option4')
//              ->leftJoin('_answer_master', '_answer_master.questionid','=','_question_master.id')
            
//              ->where([
//                  ['_question_master.subject',$subject],
//                  ['_question_master.grade',$grade],
//                  ['_question_master.sets','set2'],
                
//              ])
//              ->orderBy('category_masters.orders','ASC')
//              ->orderBy('_question_master.id', 'ASC')
//              ->get();

//          //    return $Ansers;
    

//             // return $Ansers;
          
// foreach($Ansers as $item ){
//  $correctAns = '';
    
//  if($item->answer == 'opt1'){
//      $correctAns = $item->option1;
//  }
//  if($item->answer == 'opt2'){
//      $correctAns = $item->option2;
//  }
//  if($item->answer == 'opt3'){
//      $correctAns = $item->option3;
//  }
//  if($item->answer == 'opt4'){
//      $correctAns = $item->option4;
//  }
//  // print_r($user);
//  // print_r($item->id);
// // return $subject;
// //  return $user;


//  $getCheck = FinalResult::select('*')->where([
//      ['sid',$user],
//      ['qid',$item->id],
//      ['subject',$subject],
//  ])->count();
 
//  // $ar = 'tt';
//  // return $ar;
//  // return $getCheck;
//  // die();
// // return $getCheck; 
// //   die;
//  //$array[] = $getCheck;
//      // foreach($getCheck as $it){
//      //     $its = $it->checkAns;
//      // }
//   //   print_r($getCheck);
//  if($getCheck == 0){

    
    
//      $cateid[] = array(
//          'id'=>$item->category,
//          'status'=>'null',
//      );
//      $array[] = array(
//          'qid'=>$item->id,
//          'category'=>$item->category,
       
//          'grade'=>$item->grade,
//          'question'=>$item->question,
//          'answer'=>$correctAns,
//          'check'=>'null',
//      );  
//  }else{
     
//      $getCheck = FinalResult::select('*')->where([
//          ['sid',$user],
//          ['qid',$item->id],
//          ['subject',$subject],
//      ])->first();

//     // return $getCheck;
    

//       if($getCheck->checkAns == 'false'){
//          $cateid[] = array(
//              'id'=>$item->category,
//              'status'=>'false',
//          );
//          $array[] = array(
//              'qid'=>$item->id,
//              'category'=>$item->category,

//              'grade'=>$item->grade,
//              'question'=>$item->question,
//              'answer'=>$correctAns,
//              'check'=>'incorrect',
//          );  
         
        
        
//      }else{
//          $cateid[] = array(
//              'id'=>$item->category,
//              'status'=>'true',
//          );
//          $array[] = array(
//              'qid'=>$item->id,
//              'category'=>$item->category,

//              'grade'=>$item->grade,
//              'question'=>$item->question,
//              'answer'=>$correctAns,
//              'check'=>'correct',
//          ); 
        
        
//      }
//  }    
// }



// $countCorrect = FinalResult::where([['sid',$user],['checkAns','true'],['subject',$subject]])->count();
// $countInCorrect = FinalResult::where([['sid',$user],['checkAns','false'],['subject',$subject]])->count();

// $result = array(
//     'correct'=>$countCorrect,
//     'incorrect'=>$countInCorrect,
//     'attempt'=>count($answers),
//     'total'=>$TotalQuestions,
//     'leave'=>$TotalQuestions-count($answers),
    
// );
// $findCate = QuestionMaster::select('_question_master.category')
//                          ->leftJoin('category_masters','category_masters.category','=','_question_master.category')
//                          ->orderBy('category_masters.orders','ASC')
//                          ->where([['subject',$subject],['grade',$grade],['sets','set2']])
//                          ->groupBy('_question_master.category')->get();
//                          $tot = 0;
// foreach($findCate as $find){
//    foreach($cateid as $cat){
//        if($cat['id'] == $find->category){
//          $findTotal = QuestionMaster::where([
//              ['subject',$subject],
//              ['grade',$grade],
//              ['category',$find->category],
//              ['sets','set2'],
             
//          ])
//          ->count();
//          $findCorrect = FinalResult::where([
//              ['subject',$subject],
//              ['sid',$user],
//              ['cate',$find->category],
//              ['checkAns','true']
//          ])->count();
//          $findInCorrect = FinalResult::where([
//              ['subject',$subject],
//              ['sid',$user],
//              ['cate',$find->category],
//              ['checkAns','false']
//          ])->count();
//           $cate[] = array(
//               'id'=>$find->category,
//               'total'=>$findTotal,
//               'correct'=>$findCorrect,
//               'incorrect'=>$findInCorrect,
//               'null'=>$findTotal-($findInCorrect+$findCorrect),
//           );
//           break;
//        }
       
//    }
// }
//  $res = array($array,$result,$cate,$returnTime);
//  //return response()->json($res);
// return view('student.pages.show-result')->with('question',$array)->with('overview',$result)->with('cate',$cate)->with('time',$returnTime);  

    }

    public function getPaperRemainingTime(Request $request)
    {
        if($request->user == ''){
            $time = 'NULL';
            return $time; 
        }
      
        $ValidateUser = FinalTimer::where([
            ['sid',$request->user],
            ['subject',$request->subject],
        ])->count();
        if($ValidateUser == 0){
            $time = "60:01";
            //$time = "00:10";
            return $time;
        }else{
            $ValidateUserss = FinalTimer::where([
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
                'status'=>0,
                'message'=>'something went Wrong with details',
            );
               return response()->json($error);
           }
           $ValidateUser = FinalTimer::where([
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
            $insertData = FinalTimer::insert($data);
            if(!$insertData){
              
                $error = array(
                    'status'=>0,
                    'message'=>'something went Wrong with timer || code 01',
                );
                return response()->json($error);
            }
            //return 'insert';
           }else{
            $updated = array(
                'time'=>$request->time,
                'updated_at'=>now(),
               );
               $updateData = FinalTimer::where([
                ['sid',$request->user],
                ['subject',$request->subject],
            ])->update($updated);
               if(!$updateData){
            
                $error = array(
                    'status'=>0,
                    'message'=>'something went Wrong with timer || code 02',
                );
                return response()->json($error);
               }
            //return 'update';
        }
      
        $error = array(
            'status'=>1,
            'message'=>'Time updated',
        );
        return response()->json($error);
          
         
    }

}
