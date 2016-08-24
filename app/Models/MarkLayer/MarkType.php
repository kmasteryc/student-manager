<?php

namespace App\Models\MarkLayer;

use Illuminate\Database\Eloquent\Model;

class MarkType extends Model
{
    public $table = 'mark_types';
    public $fillable = ['mark_type_name','mark_type_multiple'];
    public $timestamps = false;

	public function marks(){
		return $this->hasMany(Mark::class);
	}
}
