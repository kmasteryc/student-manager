<?php
namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller;
use App\Models\MarkLayer\Subject;
use App\Models\MarkLayer\TeachSubject;
use App\Models\UserLayer\Teacher;

class SubjectController extends Controller
{
	public function subjectTeached(){
		$teacher = Teacher::find(auth()->user()->id);

		$teached_subjects = $teacher->teachedSubjects()->get();

		$teachable_subjects = $teacher->subjects()->get();

		return view('teacher.subject_teacheds.index',[
			'teached_subjects' => $teached_subjects,
			'teachable_subjects' => $teachable_subjects,
		]);
	}
	public function subjectTeaching(){
		$teacher = Teacher::find(auth()->user()->id);

		$teaching_subjects = $teacher->teachingSubjects()->get();

		$teachable_subjects = $teacher->subjects()->get();

		return view('teacher.subject_teachings.index',[
			'teaching_subjects' => $teaching_subjects,
			'teachable_subjects' => $teachable_subjects,
		]);
	}
}