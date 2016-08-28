<?php

namespace App\Models\ClassLayer;


use App\Models\MarkLayer\Cl4ssSubject;
use App\Models\UserLayer\Student;
use App\Models\UserLayer\Teacher;
use App\Models\UserLayer\Paren;
use Illuminate\Database\Eloquent\Model;

class Cl4ss extends Model
{

	const STATE_ALL = 0;
	const STATE_DEACTIVE = 1;
	const STATE_ACTIVE = 2;

	public $table = 'cl4sses';

	public $fillable = [
		'cl4ss_type_id', 'scholastic_id', 'semester_id', 'grade_id',
		'parent_id', 'teacher_id',
		'cl4ss_state',
	];

	public $with = [
		'scholastic',
		'grade', 'semester', 'cl4ssType',
		'teacher', 'parent',
		'students'
	];

	public $timestamps = false;

	// RELATIONSHIP
	public function grade()
	{
		return $this->belongsTo(Grade::class);
	}

	public function semester()
	{
		return $this->belongsTo(Semester::class);
	}

	public function scholastic()
	{
		return $this->belongsTo(Scholastic::class);
	}

	public function teacher()
	{
		return $this->belongsTo(Teacher::class);
	}

	public function parent()
	{
		return $this->belongsTo(Paren::class);
	}

	public function students()
	{
		return $this->belongsToMany(Student::class, 'cl4ss_student', 'cl4ss_id', 'student_id');
	}

	public function subjects()
	{
		return $this->belongsToMany(\App\Models\MarkLayer\Subject::class);
	}

	public function cl4ssType()
	{
		return $this->belongsTo(Cl4ssType::class, 'cl4ss_type_id');
	}

	public function cl4ssSubjects()
	{
		return $this->hasMany(Cl4ssSubject::class);
	}

	public function scopeLoadRelation($q)
	{
		return $q->with(
			[
				'scholastic' => function ($q) {
					return $q->orderBy('scholastic_from');
				},
				'grade', 'semester', 'cl4ssType',
				'teacher', 'parent',
				'students'   => function ($q) {
					$q->orderBy('last_name', 'ASC')->with('parents');
				},
			])
			->orderBy('id', 'DESC');
	}

	// MODEL MAIN
	public function scopeResponsibleCl4ss($q, $cl4ss_state = self::STATE_ALL)
	{
		$q->where('teacher_id', auth()->id());
		if ($cl4ss_state <> self::STATE_ALL) {
			$q->where('cl4ss_state', $cl4ss_state);
		}

		return $q;
	}

	public function scopeDeactivedCl4ss($q)
	{
		return $q->where('cl4ss_state', self::STATE_DEACTIVE);
	}

	public function scopeActivedCl4ss($q)
	{
		return $q->where('cl4ss_state', self::STATE_ACTIVE);
	}

	public function getSerialCl4ss()
	{
		$current_cl4ss = $this;
		$current_scholastic = $current_cl4ss->scholastic;
		$current_grade = $current_cl4ss->grade;

		$scholastics = Scholastic::all();

		$condition = [];
		foreach ($scholastics as $scholastic) {
			$difference = $scholastic->scholastic_from - $current_scholastic->scholastic_from;

			$other_scholastic = Scholastic::where('scholastic_from', $current_scholastic->scholastic_from + $difference)
				->first();
			$other_grade = Grade::where('grade_name', $current_grade->grade_name + $difference)
				->first();

			if ($other_grade) {
				$condition[] = [
					'scholastic_id' => $other_scholastic->id,
					'grade_id'      => $other_grade->id,
				];
			}
		}

		$result = $this->where(function ($q) use ($condition) {
			foreach ($condition as $cond) {
				$q = $q->orWhere('scholastic_id', $cond['scholastic_id'])->where('grade_id', $cond['grade_id']);
			}

			return $q;
		});

		$cl4ss_type_id = $this->cl4ss_type_id;
		$result = $result->whereHas('cl4ssType', function ($q) use ($cl4ss_type_id) {
			return $q->where('id', $cl4ss_type_id);
		});


		return $result;
	}

	public function getDetailNameAttribute()
	{
		$grade = $this->grade->grade_name;
		$semester = $this->semester->semester_name;
		$scholastic_from = $this->scholastic->scholastic_from;
		$scholastic_to = $this->scholastic->scholastic_to;
		$cl4ss_type = $this->cl4ssType->cl4ss_type_name;

		return trans('general.class') . " $grade $cl4ss_type, $semester $scholastic_from - $scholastic_to";
	}
/*
	public function scopeSearch($q, $q_scholastic, $q_sesmester, $q_grade, $q_cl4ss_type, $q_teacher_name, $q_cl4ss_state)
	{

		$q->where(function ($q) use ($q_cl4ss_type, $q_grade, $q_scholastic, $q_sesmester, $q_cl4ss_state) {

			if ($q_scholastic) {
				$q->whereHas('scholastic', function ($qq) use ($q_scholastic) {
					return $qq->where('id', $q_scholastic);
				});
			}

			if ($q_sesmester) {
				$q->whereHas('semester', function ($qq) use ($q_sesmester) {
					return $qq->where('id', $q_sesmester);
				});
			}

			if ($q_grade) {
				$q->whereHas('grade', function ($qq) use ($q_grade) {
					return $qq->where('id', $q_grade);
				});
			}

			if ($q_cl4ss_type) {
				$q->where('cl4ss_type_id', $q_cl4ss_type);
			}

			if ($q_cl4ss_state) {
				$q->where('cl4ss_state', $q_cl4ss_state);
			}
		});

		if ($q_teacher_name) {
			$words = explode(' ', $q_teacher_name);
			$q->whereHas('teacher', function ($qq) use ($words) {
				return $qq->whereIn('first_name', $words)->orWhereIn('last_name', $words);
			});
		}

		return $q;
	}
*/
	public function withState($state)
	{
		return $this->where('cl4ss_state', $state);
	}
//	public function getStudentNotInCl4ss(){
//		$active_students = $this->activeCl4ss()->students()->pluck('id');
//
//	}
}
