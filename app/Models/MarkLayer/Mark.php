<?php

namespace App\Models\MarkLayer;

use App\Models\UserLayer\User;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
	public $timestamps = false;
	public $fillable = ['mark_type_id','mark_point','cl4ss_subject_id','student_id'];

    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }
    public function teacher(){
        return $this->belongsTo(User::class, 'teacher_id');
    }
	public function cl4ssSubject(){
		return $this->belongsTo(Cl4ssSubject::class);
	}
}
