<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $table = 'isfo_invitation_code';
    use HasFactory;

    static function CheckInvitation($id){
        return self::where('invitation',$id)->get();
    }
}
