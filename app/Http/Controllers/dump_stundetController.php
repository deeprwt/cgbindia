<?php

namespace App\Http\Controllers;

use App\Models\IsfoStudent;
use App\Models\PractiseTestResult;
use App\Models\student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function StudentLogin(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
           
           ]);
           if($validator->fails()){
               return back()->withInput()->withErrors($validator);
           }

            $regex = '/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/'; 
            if (preg_match($regex, $request->email, $email_is)) {
                $check = array(
                    'email'=>$request->email,
                    'password'=>$request->password
                );

                $che = student::where('email',$request->email)->count();
                if($che == 0){
                    return back()->with('error','Student not found');
                }
                if($che != 1){
                    return back()->with('error','Duplicate email found');
                }
             } 
              else { 
                $check = array(
                    'phone'=>$request->email,
                    'password'=>$request->password
                );

                $che = student::where('phone',$request->email)->count();
                if($che == 0){
                    return back()->with('error','Student not found');
                }
                if($che != 1){
                    return back()->with('error','Duplicate phone found');
                }

            }
          
            //$remember_me = true;
           if(Auth::guard('student')->attempt($check))
           {
            $previous_session = Auth::guard('student')->User()->session_id;
            if ($previous_session) {
                Session::getHandler()->destroy($previous_session);
            }
            // $up = array(
            //     'session_id'=>Session::getId()
            // );
            //return Session::getId();
            $update = array(
                'session_id'=>Session::getId(),
            );
            $updateSession = DB::table('isfo_students')->where('roll_no',Auth::guard('student')->user()->roll_no)->update($update);
            if(!$updateSession){
                return back()->with('error','error while have logging');
            }
           // Auth::guard('student')->user()->session_id = Session::getId();

           // Auth::guard('student')->user()->insert();
            
            $getphone  = Auth::guard('student')->User()->phone;

            $uniquePhone = student::where('phone',$getphone)->count();
            if($uniquePhone == 1){
                $code = '0F5NP';
                if(Auth::guard('student')->User()->school_code == '0F5NP'){
                    $getUserStatus = DB::table('temp_validation_users')->where('email',$request->email)->first();
                     if(!$getUserStatus){
                         return view('registration.school_verification')->with('code',$code)->with('email',$request->email);
                     }
                     if($getUserStatus->status == 0){
                         return view('registration.validation_process');
                     }
                     return redirect('student/home');
            }
                return redirect('student/home');
            }else{
                $code = '0F5NP';
                if(Auth::guard('student')->User()->school_code == '0F5NP'){
                    $getUserStatus = DB::table('temp_validation_users')->where('email',$request->email)->first();
                     if(!$getUserStatus){
                         return view('registration.school_verification')->with('code',$code)->with('email',$request->email);
                     }
                     if($getUserStatus->status == 0){
                         return view('registration.validation_process');
                     }
                     return view('registration.dup_phone');
            }
                
                return view('registration.dup_phone');
            }
        }
           return back()->with('error','credientials not found');
          
    }
    public function AllSubject(Request $request)
    {
        $subject = DB::table('isfo_students_subjects')->select('subject')->where('roll_no',$request->roll_no)->get();
        
        return response()->json($subject);
    }

    public function CheckInvCode(Request $request)
    {
        $code = $request->code;
        if($code == ''){
            return back()->with('error', 'School code can not be null');
        }
        $checkCode = DB::table('isfo_invitation_code')->where('school_code',$code)->first();
        if(!$checkCode){
            return back()->with('error','Invalid School Code');
        }
        return view('registration.stundet-reg1')->with('subjectCode',$checkCode->invitation_code)->with('school',$checkCode->school_code);

        
    }
    public function StundetRegistation(Request $request)
    {
        
        
        if($request->email == ''){
            $email = 'autoemail'.rand(000,9999).Carbon::now()->timestamp.'@eupheus.in';
            
        }else{
            $email = $request->email;
        }
        // return $email;
        $validator = Validator::make($request->all(), [
          
           'phone'=>'regex:/[0-9]{10}/|unique:isfo_students,phone,'.$request->phone,
           'class'=>'regex:/[0-9]{2}/',
           'password'=>'min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
           'confirm_password'=>'same:password',
           ]);
           if($validator->fails()){
               return response()->json($validator->getMessageBag()->toArray());
           }
           $checkEmail = student::where('email',$email)->count();
           if($checkEmail != 0){
            $error = array(
                'error'=>'email already exists',
                );
               return response()->json($error);
           
           }
           if($request->class == ''){
            $error = array(
                'error'=>'Select grade'
                );
               return response()->json($error);
           }
           if($request->subject == ''){
            $error = array(
                'error'=>'Select Suject'
                );
             return response()->json($error);
        }
           $roll_no = 'ISFO2021'.IsfoStudent::getRow().Carbon::now()->timestamp;
        $checkRoll = student::where('roll_no',$roll_no)->count();
        if($checkRoll != 0){
            $error = array(
                'error'=>'Something went wrong , please try again after 5mins :)'
                );
             return response()->json($error);
        }

           $insert = array(
               'name'=>$request->name,
               's_rollNo'=>$request->roll,
               'school_code'=>$request->school,
               'roll_no'=>$roll_no,
               'password'=>Hash::make($request->password),
               'class'=>$request->class,
               'email'=>$email,
               'phone'=>$request->phone,
               'event'=>'ISFO2021',
               'status'=>1,
           );
          
           $student = IsfoStudent::create($insert);
           if(!$student){
               $error = array(
               'error'=>'Something went wrong while create student'
               );
            return response()->json($error);
           }
          

        
        $subjects = $request->subject;
        foreach($subjects as $item){
            $addSub = array(
                'roll_no'=>$roll_no,
                'subject'=>$item,
                'event'=>'ISFO2021',
                'created_at'=>now(),
            );
            $insert = DB::table('isfo_students_subjects')->insert($addSub);
            if(!$insert){
                $error = array(
                    'error'=>'Error ! while create subjects'
                    );
                 return response()->json($error);
            }
        }

           $stuemail = $email;
           $data = array(
               'name'=>$request->name,
               'email'=>$email,
               'password'=>$request->password,
           );
           Mail::send('email.toStudent', ['data'=>$data], function ($message) use ($stuemail) {
                
            $message->to($stuemail, '')
                ->from('donotreply@eupheus.in')
                ->subject('Thank you for registering for ISFO');
        
        });
       
        
           $error = array(
            'success'=>'Registration Success',
           );
            return response()->json($error);
    }

    public function ShowPractise()
    { 
      $id = Auth::guard('student')->User()->roll_no;
      $grd = Auth::guard('student')->User()->class;
      $get = DB::table('isfo_students_subjects')->where('roll_no',$id)->get();
      $class = '0'.$grd;
        if($grd == 10){
            $class = $grd;
        }
      foreach($get as $item){
        $checkSubject = PractiseTestResult::where([
                                                    ['sid',$id],
                                                    ['subject',$item->subject],
                                                    ])
                                                    ->count();
        if($checkSubject == 0){
            $show = 0;
        }else{
            $show= 0;
        }
          $subject = $item->subject;
          if($subject == 'Mathematics'){
              $subject = 'maths';
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
        $book[] = [
            'subject'=> $item->subject,
            'book'=>$books,
            'cover'=>$img,
            'show'=>$show,
        ];
      }
      

      return view('student.pages.practise-material')->with('book',$book);
     
    }

    public function showPractiseTest()
    {
        $id = Auth::guard('student')->User()->roll_no;
        $grd = Auth::guard('student')->User()->class;
        if(Auth::guard('student')->User()->status == 1){
            $get = DB::table('isfo_students_subjects')->where('roll_no',$id)->get();
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
                $checkSubject = PractiseTestResult::where([
                    ['sid',$id],
                    ['subject',$subject],
                    ])
                    ->count();
                    if($checkSubject == 0){
                    $show = 0;
                    }else{
                    $show= 1;
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
              $book[] = [
                  'subject'=> $sub,
                  'book'=>$books,
                  'cover'=>$img,
                  'show'=>$show,
              ];

            }
            
      
            return view('student.pages.practise-test')->with('book',$book);
        }
    //   /  return back()->with('error','Access denied');
    }

    // public function AddSubject(Request $request)
    // {
    //     if($request->code == ''){
    //         $error = array(
    //             'error'=>'Subject Code can not be null'
    //         );
    //         return response()->json($error);
    //     }
    //     if($request->id == ''){
    //         $error = array(
    //             'error'=>'Something went wrong'
    //         );
    //         return response()->json($error);
    //     }
    //     $getSchoolCode = IsfoStudent::select('*')->where('email',$request->id)->first();
        

    //     $validateSubject = DB::table('isfo_students_subjects')->where([
    //         ['roll_no',$getSchoolCode->roll_no],
    //         ['subject',$request->code]
    //     ])
    //     ->count();
    //     if($validateSubject == 1){
    //         $error = array(
    //             'error'=>'Error ! , Subject Already Exists'
    //         );
    //         return response()->json($error);
    //     }
    //     $ValidateCode = DB::table('isfo_invitation_code')->where('invitation_code',$request->code)->count();
    //     if($ValidateCode == 0){
    //         $error = array(
    //             'error'=>'Invalid Subject Invitation Code'
    //         );
    //         return response()->json($error);
    //     }
    //     if(substr($request->code,0,5) == $getSchoolCode->school_code){
    //         $addSubject = array(
    //             'roll_no'=>$getSchoolCode->roll_no,
    //             'subject'=>$request->code,
    //             'event'=>'ISFO2021',
    //             'created_at'=>now(),
    //         );
    //         $insertSuject = DB::table('isfo_students_subjects')->insert($addSubject);
    //         if(!$insertSuject){
    //             $error = array(
    //                 'error'=>'Error ! , while create subject'
    //             );
    //             return response()->json($error);
    //         }
    //         $error = array(
    //             'success'=>'Subject Added Successfully'
    //         );
    //         return response()->json($error);

    //     }
    //     $error = array(
    //         'error'=>'Invalid Subject Invitation Code'
    //     );
    //     return response()->json($error);
    
    // }

    public function verifyschoolCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
           '*'=>'required',
           ]);
           if($validator->fails()){
               return view('registration.school_verification')->with('email',$request->email)->with('error','fill all fields properly');
           }
         $data = array(
             'email'=>$request->email,
             'school_code'=>$request->code,
             'status'=>0,
             'created_at'=>now(),
             'school_name'=>$request->name,
             'city'=>$request->city,
             'state'=>$request->state,
             'pin'=>$request->pin,
         );
         $getUserStatus = DB::table('temp_validation_users')->where('email',$request->email)->count();
        
         if($getUserStatus == 0){
            $insert = DB::table('temp_validation_users')->insert($data);
            if(!$insert){
               return view('registration.school_verification')->with('email',$request->email)->with('error','something went wrong');
            }
            return view('registration.data-sent');
         }

  return view('registration.validation_process');
        
    }

    public function validatePhoneNumber(Request $request)
    {
        $validator = Validator::make($request->all(), [
            '*'=>'required',
            'phone'=>'digits:10',
            ]);
            if($validator->fails()){
                return view('registration.dup_phone')->with('error','please check number');
            }
            $check = student::where('phone',$request->phone)->count();
            if($check == 0){
                $data = array(
                    'phone'=>$request->phone,
                );
                //return $request->roll_no;

                $update = student::where('roll_no',$request->id)->update($data);
                if(!$update){
                    return view('registration.dup_phone')->with('error1','something went wrong');
                }
                return redirect('studentLogin')->with('success','phone number has been updated successfully');
            }
            return view('registration.dup_phone')->with('error0','phone number already exists');
    }
}
