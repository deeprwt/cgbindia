<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsfoStudent extends Model
{
    protected $table = 'isfo_students';
    use HasFactory;

    protected $fillable = [
        'name',
        's_rollNo',
        'roll_no',
        'password',
        'class',
        'email',
        'phone',
        'school_code',
        'event',
        'status',
        'last_session',
    ];

    static function getRow(){
        $get = self::all();
        return count($get);
    }

    static function UserData($email){
        return self::where('email',$email)->get();
    }
    
}
