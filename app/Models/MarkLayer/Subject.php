<?php

namespace App\Models\MarkLayer;

use App\Models\ClassLayer\Cl4ss;
use App\Models\UserLayer\Teacher;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
	public function teachers(){
		return $this->belongsToMany(Teacher::class,'subject_teacher','subject_id');
	}
	public function cl4sses(){
		return $this->belongsToMany(Cl4ss::class);
	}
	
	public function activedSubject(){
//		return $this->cl4sses()->activedCl4ss();
		return $this->whereHas('cl4sses', function($q) {
			return $q->activedCl4ss();
		});
	}
}
