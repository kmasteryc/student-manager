<?php

namespace App\Http\Controllers\Student;

use App\Models\ClassLayer\Cl4ss;
use App\Models\MarkLayer\Cl4ssSubject;
use App\Models\MarkLayer\Mark;
use App\Models\MarkLayer\MarkType;
use App\Models\UserLayer\Student;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class SubjectController extends Controller
{

	protected $_student;

	public function __construct()
	{
		$this->_student = Student::createFromAuth();
	}

	public function showCurrent()
	{
		$cl4sses = $this->_student->getCl4ssWithMarks(Cl4ss::STATE_ACTIVE)->get();

		return view('student.subjects.show_current', [
			'student'    => $this->_student,
			'cl4sses'    => $cl4sses,
			'mark_types' => MarkType::all(),
		]);
	}

	public function showAll()
	{
		$cl4sses = $this->_student->getCl4ssWithMarks()
			->with(['cl4ssSubjects'=>function($q){
				$q->with(['subject','teacher','marks'=>function($qq){
					$qq->with('markType','student');
				}]);
			}])
			->loadRelation()
			->get();

		return view('student.subjects.show_all', [
			'student'    => $this->_student,
			'cl4sses'    => $cl4sses,
			'mark_types' => MarkType::all(),
		]);
	}

	public function showOther()
	{
	}
}
