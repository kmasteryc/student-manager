<?php

namespace App\Models\ClassLayer;


use App\Models\UserLayer\Student;
use Illuminate\Database\Eloquent\Model;

class Cl4ss extends Model
{
    public $table = 'cl4sses';
    public $fillable = ['cl4ss_name','scholastic_id','semester_id','grade_id', 'parent_id', 'teacher_id'];
    public $timestamps = false;

    public function grade(){
        return $this->belongsTo(Grade::class);
    }
    public function semester(){
        return $this->belongsTo(Semester::class);
    }
    public function scholastic(){
        return $this->belongsTo(Scholastic::class);
    }
//    public function users(){
//        return $this->belongsToMany(\App\User::class);
//    }
public function students(){
	return $this->belongsToMany(Student::class,'cl4ss_student','cl4ss_id','student_id');
}
    public function subjects(){
        return $this->belongsToMany(\App\Models\MarkLayer\Subject::class);
    }

    public function getDetailNameAttribute(){
        $grade = $this->grade->grade_name;
        $semester = $this->semester->semester_name;
        $scholastic_from = $this->scholastic->scholastic_from;
        $scholastic_to = $this->scholastic->scholastic_to;
        $cl4ss = $this->attributes['cl4ss_name'];

        return trans('general.class')." $grade $cl4ss, $semester $scholastic_from - $scholastic_to";
    }
}
