<?php

namespace App\Models\UserLayer;

use App\Models\ClassLayer\Cl4ss;
use App\Models\MarkLayer\Subject;
use App\Models\MarkLayer\TeachSubject;
use App\User;
use Illuminate\Database\Eloquent\Builder;

class Teacher extends User
{

	public $table = 'users';

	public static function boot()
	{
		parent::boot();
		static::addGlobalScope('teacher', function (Builder $builder) {
			$builder->where('role_id', 3);
		});
	}

	public function cl4sses()
	{
		return $this->hasMany(Cl4ss::class);
	}

	public function subjects()
	{
		return $this->belongsToMany(Subject::class, 'subject_teacher', 'teacher_id');
	}

	public function teachSubjects()
	{
		return $this->hasMany(TeachSubject::class)
			->with([
					'subject', 'teacher',
					'cl4ss' => function ($q) {
						$q->loadRelation();
					}]
			);
	}

	public function teachingSubjects()
	{
		return $this->teachSubjects()->whereHas('cl4ss', function ($q) {
			return $q->activedCl4ss();
		});
	}

	public function teachedSubjects()
	{
		return $this->teachSubjects()->whereHas('cl4ss', function ($q) {
			return $q->deactivedCl4ss();
		});
	}

	public static function storeTeacher($request)
	{
		$user = self::create($request->all());
		$user->role_id = 3;
		$user->password = \Hash::make($user->password);
		$user->subjects()->attach($request->subjects);
//		return $user->save();
	}

	public function updateTeacher($request)
	{
		$this->update($request->all());
		$this->subjects()->sync($request->subjects);
//		$this->save();
	}

}
