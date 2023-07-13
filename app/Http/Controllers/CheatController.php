<?php

namespace App\Http\Controllers;

use App\Models\Cheat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CheatController extends Controller
{
    public function RightClick(Request $request)
    {
            $id = Auth::guard('student')->User()->roll_no;
            //$event = $request->event;

            $StudentStatus = Cheat::count($id);
            if($StudentStatus == 0){
                $create = array(
                    'sid'=>$id,
                    'rightClick'=>1,
                    'created_at'=>now(),
                );

                $create = Cheat::insert($create);
                if(!$create){
                    $error = array(
                        'status'=>'error',
                        'message'=>'error while create rightClick',
                    );

                    return response()->json($error);
                }
               return false;
            }

            $get = Cheat::where('sid',$id)->first();
            $update = array(
                'rightClick'=>$get->rightClick+1,
            );
            $upd = Cheat::where('sid',$id)->update($update);
            if(!$upd){
                $error = array(
                    'status'=>'error',
                    'message'=>'error while update rightClick',
                );

                return response()->json($error);
            }

            $error = array(
                'status'=>'success',
                'message'=>'RightClick counted successfully',
            );

            return response()->json($error);
    }

    // public function DblRightClick(Request $request)
    // {
        
    // }

    public function Copy(Request $request)
    {
        $id = Auth::guard('student')->User()->roll_no;
        //$event = $request->event;

        $StudentStatus = Cheat::count($id);
        if($StudentStatus == 0){
            $create = array(
                'sid'=>$id,
                'copy'=>1,
                'created_at'=>now(),
            );

            $create = Cheat::insert($create);
            if(!$create){
                $error = array(
                    'status'=>'error',
                    'message'=>'error while create copy',
                );

                return response()->json($error);
            }
           return false;
        }

        $get = Cheat::where('sid',$id)->first();
        $update = array(
            'copy'=>$get->copy+1,
        );
        $upd = Cheat::where('sid',$id)->update($update);
        if(!$upd){
            $error = array(
                'status'=>'error',
                'message'=>'error while update copy',
            );

            return response()->json($error);
        }

        $error = array(
            'status'=>'success',
            'message'=>'copy counted successfully',
        );

        return response()->json($error);
    }

    public function TabChange(Request $request)
    {
        $id = Auth::guard('student')->User()->roll_no;
        $event = $request->event;

        $StudentStatus = Cheat::count($id);
        if($StudentStatus == 0){
            $create = array(
                'sid'=>$id,
                'tabChange'=>1,
                'created_at'=>now(),
            );

            $create = Cheat::insert($create);
            if(!$create){
                $error = array(
                    'status'=>'error',
                    'message'=>'error while create tabChange',
                );

                return response()->json($error);
            }
           return false;
        }

        $get = Cheat::where('sid',$id)->first();
        $update = array(
            'tabChange'=>$get->tabChange+1,
        );
        $upd = Cheat::where('sid',$id)->update($update);
        if(!$upd){
            $error = array(
                'status'=>'error',
                'message'=>'error while update tabChange',
            );

            return response()->json($error);
        }

        $error = array(
            'status'=>'success',
            'message'=>'tabChange counted successfully',
        );

        return response()->json($error);

    }

  
}
