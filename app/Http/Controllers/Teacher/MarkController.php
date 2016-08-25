<?php

namespace App\Http\Controllers\Teacher;


use App\Models\MarkLayer\Cl4ssSubject;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\MarkLayer\Mark;
use App\Models\MarkLayer\MarkType;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function create(Cl4ssSubject $cl4ss_subject){
	    $cl4ss_subject->load(['cl4ss'=>function($q){
		  $q->loadRelation();
	    }]);
	    return view('teacher.marks.create',[
		    'cl4ss_subject' => $cl4ss_subject,
		    'mark_types' => MarkType::all()
	    ]);
    }

	public function store(Cl4ssSubject $cl4ss_subject, Request $request){
		foreach ($request->students as $student_id => $marks){
			foreach ($marks as $mark_type_id => $mark_point){
				if ($mark_point > -1){
					$insert = [
						'mark_point' => $mark_point,
						'mark_type_id' => $mark_type_id,
						'cl4ss_subject_id' => $cl4ss_subject->id,
						'student_id' => $student_id
					];
					Mark::firstOrCreate($insert);
				}
			};
		}
		return redirect()->route('teacher::mark::create', $cl4ss_subject);
	}
}
