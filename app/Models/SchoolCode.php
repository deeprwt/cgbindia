<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolCode extends Model
{
    protected $table = 'school_codes';
    use HasFactory;

    static function checkCode($school,$state,$city){
        return self::select('school_code')
        ->where([
            ['school_name','=',$school],
            ['state_id','=',$state],
            ['city_name','=',$city]
        ])
        ->first();
    }

}
