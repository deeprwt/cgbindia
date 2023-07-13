<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cheat extends Model
{
    protected $table = 'isfo_final_anticheat';
    use HasFactory;

    static function count($rollno){
        return self::where('sid',$rollno)->count();
    }
}
