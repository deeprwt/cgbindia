<?php

namespace App\Http\Controllers;

use App\Models\IsfoStudent;
use App\Models\schoolLogin;
use App\Models\student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Rahulreghunath\Textlocal\Textlocal;
use Seshac\Otp\Otp;


class authController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
           
           ]);
           if($validator->fails()){
               return back()->withInput()->withErrors($validator);
           }
        $remember_me = $request->has('remember_me') ? true : false;
    
        $check = $request->only('email', 'password');

        //if(student::where('email'))
        
        if(Auth::guard('admin')->attempt($check, $remember_me))
        {
            return redirect('admin/dashboard');
        }
        return back('error','credientials not found');
       
    }
    public function signup(Request $request){
       $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email|unique:admins,email',
        'password' => 'required|min:5',
        'confirmPassword'=>'required'

       ]);
       if($validator->fails()){
           return back()->withInput()->withErrors($validator);
       }
       if($request->password != $request->confirmPassword){
           return back()->with('error','passowrd does not match');
       }
       $data = array(
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=>Hash::make($request->password)  
       );
       if(User::create($data)){
           return redirect('/')->with('success','Registraion Completed');
       }
       return back()->with('error','something went wrong');
    }

    public function schoolLogin(Request $request)
    {           
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'password' => 'required',
           
           ]);
           if($validator->fails()){
               return back()->withInput()->withErrors($validator);
           }
           $check = array(
               'school_code'=>$request->code,
               'password'=>$request->password
           );
        
           if(Auth::guard('teacher')->attempt($check))
           {
               return redirect('school/home');
           }
           //return back('error','credientials not found');
           return back()->with('error','school code not found');
    }

   

    public function logout(Request $request)        
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('school-login');
    }


    public function studentForgotPassowrd(Request $request)
    {
        if($request->email == ''){
            return back()->with('error','Email can not be empty');
        }
        $check = IsfoStudent::where('phone',$request->email)->count();
        if($check == 1){
            $identifier = $request->email;
            $otp =  Otp::setValidity(1440)  // otp validity time in mins
            ->setLength(6)  // Lenght of the generated otp
            ->setMaximumOtpsAllowed(3) // Number of times allowed to regenerate otps
            ->setOnlyDigits(true)  // generated otp contains mixed characters ex:ad2312
            ->setUseSameToken(false) // if you re-generate OTP, you will get same token
            ->generate($identifier);
          
            if($otp->status ==0){
                return back()->with('error',$otp->message);
            }
            
            $message = 'Your One Time Password is '.$otp->token.'. Please do not share your One Time Password with anyone. - Eupheus Learning';
            $user = IsfoStudent::select('roll_no')->where('phone',$request->email)->first();
            $users = $user->roll_no;
            $receiver  = $request->email;
            $sms = new Textlocal();
            $sms->send($message,$receiver);
            
            return view('registration.new-password')->with('user',$users);
        }   
        if($check == 0){
            return back()->with('error','phone is not found ');
        }
       
        return back()->with('error','Contact to isfo support team');
    }
   
    public function NewPassword(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'password'=>'min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
            'confirm_password'=>'same:password',
           ]);
           if($validator->fails()){
               return redirect('student-forgot-password')->withInput()->withErrors($validator);
           }
           
           $phone = IsfoStudent::select('*')->where('roll_no',$request->user)->first();
           $verify = Otp::setAllowedAttempts(3) 
            ->validate($phone->phone, $request->otp);
          //return $verify;
          if($verify->status == 0){
            return redirect('student-forgot-password')->with('error',$verify->message);
          }
            if($verify->status == 1){
                $updatePassword = array(
                    'password'=>Hash::make($request->password),
                );
                $update = IsfoStudent::where('phone',$phone->phone)->update($updatePassword);
                if(!$update){
                    return  redirect('studentLogin')->with('error','Something went wrong');
                }
                return  redirect('studentLogin')->with('success','New Password created');
            }
            else{
                return  redirect('studentLogin')->with('error','Incorrect Opt');
            }

    }
}
