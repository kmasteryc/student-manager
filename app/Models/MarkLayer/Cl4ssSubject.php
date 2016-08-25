<?php

namespace App\Models\MarkLayer;

use App\Models\ClassLayer\Cl4ss;
use App\Models\UserLayer\Teacher;
use Illuminate\Database\Eloquent\Model;

class Cl4ssSubject extends Model
{
    public $table = 'cl4ss_subject';
	public $timestamps = false;

	public function cl4ss(){
		return $this->belongsTo(Cl4ss::class);
	}

	public function teacher(){
		return $this->belongsTo(Teacher::class);
	}

	public function subject(){
		return $this->belongsTo(Subject::class);
	}

	public function marks(){
		return $this->hasMany(Mark::class);
	}

	public function loadRelation(){
		return $this->with([
			'cl4ss' => function($q){
				$q->loadRelation();
			},
			'subject',
			'teacher'
		]);
	}
}
