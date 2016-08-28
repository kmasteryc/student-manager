<?php

namespace App\Models\MarkLayer;

use App\Models\UserLayer\Student;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
	public $timestamps = false;
	public $fillable = ['mark_type_id','mark_point','cl4ss_subject_id','student_id'];

    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }
	public function cl4ssSubject(){
		return $this->belongsTo(Cl4ssSubject::class);
	}
	public function markType(){
		return $this->belongsTo(MarkType::class);
	}
}
