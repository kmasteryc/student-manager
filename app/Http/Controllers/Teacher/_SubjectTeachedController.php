<?php
namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller;
use App\Models\MarkLayer\Subject;
use App\Models\MarkLayer\TeachSubject;
use App\Models\UserLayer\Teacher;

class SubjectTeachedController extends Controller
{
	public function index(){
		$teacher = Teacher::find(auth()->user()->id);

		$teached_subjects = $teacher->teachedSubjects()->get();

		$teachable_subjects = $teacher->subjects()->get();

		return view('teacher.subject_teacheds.index',[
			'teached_subjects' => $teached_subjects,
			'teachable_subjects' => $teachable_subjects,
		]);
	}
}