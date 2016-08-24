<?php

namespace App\Models\ClassLayer;

use Illuminate\Database\Eloquent\Model;

class Cl4ssType extends Model
{
	public $table = 'cl4ss_types';
	public $timestamps = false;
	public $fillable = ['cl4ss_type_name'];
	
    public function cl4sses(){
	    return $this->hasMany(Cl4ss::class,'cl4ss_type_id');
    }
}
