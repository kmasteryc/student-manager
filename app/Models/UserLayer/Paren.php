<?php

namespace App\Models\UserLayer;

use App\User;
use Illuminate\Database\Eloquent\Builder;

class Paren extends User
{

	public $table = 'users';

	public static function boot()
	{
		parent::boot();
		static::addGlobalScope('parent', function (Builder $builder) {
			$builder->where('role_id', 2);
		});
	}

	public static function storeParent($request)
	{
		$parent = self::create($request->all());
		$parent->role_id = 2;
		$parent->password = \Hash::make($parent->password);
		$parent->save();

		$students = $request->students !== null ? $request->students : [];
		$parent->students()->sync($students);
	}

	public function updateParent($request)
	{
		$this->update($request->all());
		$students = $request->students !== null ? $request->students : [];
		$this->students()->sync($students);
	}

	public function students()
	{
		return $this->belongsToMany(Student::class, 'parent_student', 'parent_id', 'student_id');
	}

//	public function getAllChildsAttribute(){
//		return 'I am here';
//	}

}
