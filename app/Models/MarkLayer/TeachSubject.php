<?php

namespace App\Models\MarkLayer;

use App\Models\ClassLayer\Cl4ss;
use App\Models\UserLayer\Teacher;
use Illuminate\Database\Eloquent\Model;

class TeachSubject extends Model
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
}
