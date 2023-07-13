<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userQuestionStore extends Model
{

    protected $table = 'stu_question_store';
    use HasFactory;

    protected $fillable = [
        'sid',
        'qid',
        'subject',
        'user_option',
        'status',
    ];



    static function count($sid,$subject,$status){
        return self::where([['sid',$sid],['subject',$subject],['status',$status]])->count();
    }
    static function QuestionCount($sid,$subject,$status,$qid){
        return self::where([['sid',$sid],['subject',$subject],['status',$status],['qid',$qid]])->count();
    }
}
