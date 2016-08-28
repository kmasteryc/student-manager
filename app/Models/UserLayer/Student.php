<?php

namespace App\Models\UserLayer;

use App\Models\MarkLayer\Mark;
use App\User;
use App\Models\ClassLayer\Cl4ss;
use App\Models\ClassLayer\Cl4ssType;

use Illuminate\Database\Eloquent\Builder;

class Student extends User
{

	public $table = 'users';

	public static function boot()
	{
		parent::boot();
		static::addGlobalScope('parent', function (Builder $builder) {
			$builder->where('role_id', 1);
		});
	}

	public function cl4sses()
	{
		return $this->belongsToMany(Cl4ss::class, 'cl4ss_student', 'student_id', 'cl4ss_id');
	}

	public function parents()
	{
		return $this->belongsToMany(Paren::class, 'parent_student', 'student_id', 'parent_id');
	}

	public function marks(){
		return $this->hasMany(Mark::class);
	}

	public static function storeStudent($request)
	{
		$student = self::create($request->all());
		$student->role_id = 1;
		$student->password = \Hash::make($student->password);
		$student->save();

		$parents = $request->parents !== null ? $request->parents : [];
		$student->parents()->sync($parents);

		$cl4sses = $request->cl4sses !== null ? $request->cl4sses : [];
		$student->cl4sses()->sync($cl4sses);
	}

	public function updateStudent($request)
	{
		$this->update($request->all());

		$parents = $request->parents !== null ? $request->parents : [];
		$this->parents()->sync($parents);

		$cl4sses = $request->cl4sses !== null ? $request->cl4sses : [];
		$this->cl4sses()->sync($cl4sses);
	}

//	public function scopeSearch($q, $q_scholastic, $q_sesmester, $q_grade, $q_cl4ss_type, $q_student_name)
//	{
//
//		$q->whereHas('cl4sses', function ($q) use ($q_cl4ss_type, $q_grade, $q_scholastic, $q_sesmester) {
//
//			if ($q_scholastic) {
//				$q->whereHas('scholastic', function ($qq) use ($q_scholastic) {
//					return $qq->where('id', $q_scholastic);
//				});
//			}
//
//			if ($q_sesmester) {
//				$q->whereHas('semester', function ($qq) use ($q_sesmester) {
//					return $qq->where('id', $q_sesmester);
//				});
//			}
//
//			if ($q_grade) {
//				$q->whereHas('grade', function ($qq) use ($q_grade) {
//					return $qq->where('id', $q_grade);
//				});
//			}
//
//			if ($q_cl4ss_type) {
//				$q->where('cl4ss_type_id', $q_cl4ss_type);
//			}
//
//		});
//
//		if ($q_student_name) {
//			$words = explode(' ', $q_student_name);
//			$q->whereIn('first_name', $words)->orWhereIn('last_name', $words);
//		}
//
//		return $q;
//	}

	public function getCl4ssWithMarks($state = '')
	{
		$q = $this->cl4sses()
			->with([
				'cl4ssSubjects' => function ($q) {
					$q->with(['subject', 'marks'=>function($qq){
						$qq->where('student_id', $this->id)
							->with('markType');
					}]);
				},
			]);
		if ($state) {
			$q->where('cl4ss_state', $state);
		}

		return $q;
	}
}
