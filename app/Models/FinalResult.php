<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalResult extends Model
{
    protected $table = 'final_test_result';
    use HasFactory;
    protected $fillable = [
        'sid',
        'subject',
        'qid',
        'option',
        'timetaken',
        'event',
        'checkAns',
        'cate'
    ];
}
