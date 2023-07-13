<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolMaster extends Model
{
    protected $table = 'school_codes';
    use HasFactory;
   static function getSchool($code){
       return self::where('school_code','=',$code)->first();
   }
}
