<?php

namespace App\Http\Controllers;

use App\Models\IsfoStudent;
use App\Models\FinalResult;
use App\Models\QuestionMaster;
use App\Models\student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FinalResultController extends Controller
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
            return redirect('student/finalresult');
        }
        $subject = $request->subject;
        if($request->subject == 'Mathematics'){
            $subject = 'Maths';
        }else{
            $subject = $request->subject;
        }
      //return $subject;
        $answers = FinalResult::where([
            ['sid',$user],
            ['subject',$subject],
        ])
        ->get();
        //return $answers;
        $Checktotaltime  = DB::table('final_test_timer')->where([
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
         
            $getCheck = FinalResult::select('*')->where([
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
                
                $getCheck = FinalResult::select('*')->where([
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
           
           $countCorrect = FinalResult::where([['sid',$user],['checkAns','true'],['subject',$subject]])->count();
           $countInCorrect = FinalResult::where([['sid',$user],['checkAns','false'],['subject',$subject]])->count();
        
           $details = array(
               'name'=>IsfoStudent::where('roll_no',$request->user)->first()->name,
               'subject'=>$subject,
               'class'=>$grade,
               'rollno'=>$user,
               'school'=>DB::table('school_codes')->where('school_code',IsfoStudent::where('roll_no',$request->user)->first()->school_code)->first()->school_name,
               'held'=>IsfoStudent::where('roll_no',$request->user)->first()->event,
           );
           // $toppercorrect = DB::select("SELECT MAX(correct) as toppercorrect FROM (SELECT r.sid as sid,r.subject as subject,COUNT(*) as correct FROM final_test_result r,isfo_students s WHERE r.sid=s.roll_no AND checkAns='true' AND s.class=".$grade." AND subject='".$subject."' GROUP BY sid,subject) T GROUP BY subject");
           // $topperincorrect = DB::select("SELECT MAX(incorrect) as topperincorrect FROM (SELECT r.sid as sid,r.subject as subject,COUNT(*) as incorrect FROM final_test_result r,isfo_students s WHERE r.sid=s.roll_no AND checkAns='false' AND s.class=".$grade." AND subject='".$subject."' GROUP BY sid,subject) T GROUP BY subject");
           $avgcorrect = DB::select("SELECT AVG(correct) as avgcorrect FROM (SELECT r.sid as sid,r.subject as subject,COUNT(*) as correct FROM final_test_result r,isfo_students s WHERE r.sid=s.roll_no AND checkAns='true' AND s.class=".$grade." AND subject='".$subject."' GROUP BY sid,subject) T GROUP BY subject");
           $avgincorrect = DB::select("SELECT AVG(incorrect) as avgincorrect FROM (SELECT r.sid as sid,r.subject as subject,COUNT(*) as incorrect FROM final_test_result r,isfo_students s WHERE r.sid=s.roll_no AND checkAns='false' AND s.class=".$grade." AND subject='".$subject."' GROUP BY sid,subject) T GROUP BY subject");
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
                    $findCorrect = FinalResult::where([
                        ['subject',$subject],
                        ['sid',$user],
                        ['cate',$find->category],
                        ['checkAns','true']
                    ])->count();
                    $findInCorrect = FinalResult::where([
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
                         // 'toppercorrect'=>DB::select("SELECT MAX(correct) as toppercorrect FROM (SELECT r.subject as subject,r.cate as cate,COUNT(*) as correct FROM final_test_result r,isfo_students s WHERE r.sid=s.roll_no AND r.checkAns='true' AND s.class=".$grade." AND r.subject='".$subject."' AND r.cate='".$find->category."' GROUP BY r.sid,r.subject,r.cate) T GROUP BY subject,cate"),
                         'avgcorrect'=>DB::select("SELECT AVG(correct) as avgcorrect FROM (SELECT r.subject as subject,r.cate as cate,COUNT(*) as correct FROM final_test_result r,isfo_students s WHERE r.sid=s.roll_no AND r.checkAns='true' AND s.class=".$grade." AND r.subject='".$subject."' AND r.cate='".$find->category."' GROUP BY r.sid,r.subject,r.cate) T GROUP BY subject,cate"),
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
// 

}
