<?php

namespace App\Models\MarkLayer;

use App\Models\UserLayer\User;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }
    public function teacher(){
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
