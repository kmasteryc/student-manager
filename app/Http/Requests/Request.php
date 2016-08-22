<?php

namespace App\Http\Requests;

use App\Models\ClassLayer\Grade;
use App\Models\ClassLayer\Scholastic;
use App\Models\ClassLayer\Semester;
use App\Models\ClassLayer\Cl4ss;
use App\Models\MarkLayer\MarkType;
use App\Models\UserLayer\Teacher;
use App\Models\UserLayer\Student;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    public function getScholastic(){
        return new Scholastic(request()->all());
    }
    public function getSemester(){
        return new Semester(request()->all());
    }
    public function getGrade(){
        return new Grade(request()->all());
    }
    public function getCl4ss(){
        return new Cl4ss(request()->all());
    }
    public function getMarkType(){
        return new MarkType(request()->all());
    }
	public function getTeacher(){
		return new Teacher(request()->all());
	}
}

