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
		$cl4ss = $this->_student->cl4sses()->where('cl4ss_state', Cl4ss::STATE_ACTIVE)->first();

		$cl4ss_subjects = Cl4ssSubject::where([
			'cl4ss_id' => $cl4ss->id,
		])->get();

		$marks = Mark::where('student_id', $this->_student->id)
			->whereIn('cl4ss_subject_id', $cl4ss_subjects->pluck('id'))
			->get();

		return view('student.subjects.show_current', [
			'student'        => $this->_student,
			'cl4ss'          => $cl4ss,
			'marks'          => $marks,
			'cl4ss_subjects' => $cl4ss_subjects,
			'mark_types'     => MarkType::all(),
		]);
	}


	public function showAll1()
	{
		$marks = $this->_student->marks()->with('cl4ssSubject.cl4ss')->get();
		$cl4sses = $this->_student->cl4sses;
		$cl4ss_ids = $cl4sses->pluck('id');

		$result = [];

		$marks = $marks->filter(function ($mark) use ($cl4ss_ids, &$result) {
			$cl4ss = $mark->cl4ssSubject->cl4ss;

			return $cl4ss_ids->contains($cl4ss->id);
		});

		var_dump($marks->toArray());

		return view('student.subjects.show_all', [
			'marks'      => $marks,
			'student'    => $this->_student,
			'cl4sses'    => $cl4sses,
			'mark_types' => MarkType::all(),
		]);
	}

	public function showAll(){
		$cl4sses = $this->_student->cl4sses()->with([
			'cl4ssSubjects' => function($q){
				$q->with('subject','marks');
			}
		])->get();

//		dd($cl4sses->toArray());
//		$marks = $this->_student->marks()->with('cl4ssSubject')->get();
		return view('student.subjects.show_all', [
//			'marks'      => $marks,
			'student'    => $this->_student,
			'cl4sses'    => $cl4sses,
			'mark_types' => MarkType::all(),
		]);
	}

	public function showOther()
	{
	}
}
