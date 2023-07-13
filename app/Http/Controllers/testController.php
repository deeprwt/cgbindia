<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function passowrd(Request $request)
    {
        $email = $request->email;

        $get = student::where('email',$email)->get();
        
    }
}
