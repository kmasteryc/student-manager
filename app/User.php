<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_name', 'email', 'password', 'first_name', 'last_name', 'birthday', 'role_id', 'info'
	];

	protected $dates = ['birthday'];

	public $appends = ['full_name'];

	public $dateFormat = 'Y/m/d';

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

//	public function cl4sses()
//	{
//		return $this->belongsToMany(Models\ClassLayer\Cl4ss::class);
//	}

	public function marks()
	{
		return $this->hasMany(Models\MarkLayer\Mark::class, 'student_id');
	}

	public function role()
	{
		return $this->belongsTo(Models\UserLayer\Role::class);
	}

	// This use for teacher only
	public function subjects()
	{
		return $this->belongsToMany(Models\MarkLayer\Subject::class, 'subject_user', 'user_id');
	}
	//	END RELATIONSHIP

	public function getBirthDayAttribute(){
		return Carbon::parse($this->attributes['birthday'])->format('Y/m/d');
	}
	public function getFullNameAttribute(){
		return $this->full_name();
	}
	public function full_name(){
		return $this->attributes['last_name'].' '.$this->attributes['first_name'];
	}
}

