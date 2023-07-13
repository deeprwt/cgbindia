<?php

namespace App\Http\Controllers;

use App\Models\SchoolMaster;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
        public function getSchoolCheck(Request $request)
        {
            $id = $request->code;
           
            $output = array();
            if($request->code == ''){
                $output = array(
                    'error1'=>'school code empty',
                );
                return response()->json($output);
            }
            $school =   SchoolMaster::getSchool($id);
            if(!$school){
                $output = array(
                    'error2'=>'No School found :(',
                );
                return response()->json($output);
            }
            $output = array(
                'success'=>$school,
            );
           return response()->json($output);
        }
}
