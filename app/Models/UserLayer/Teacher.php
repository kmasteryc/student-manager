<?php

namespace App\Models\UserLayer;

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

	public static function storeTeacher($request)
	{
		$user = self::create($request->all());
		$user->role_id = 3;
		$user->password = \Hash::make($user->password);
		$user->subjects()->attach($request->subjects);
//		return $user->save();
	}

	public function updateTeacher($request){
		$this->update($request->all());
		$this->subjects()->sync($request->subjects);
//		$this->save();
	}

}
