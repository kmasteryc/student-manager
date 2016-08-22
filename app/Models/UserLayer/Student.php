<?php

namespace App\Models\UserLayer;

use App\User;
use App\Models\ClassLayer\Cl4ss;
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

}
