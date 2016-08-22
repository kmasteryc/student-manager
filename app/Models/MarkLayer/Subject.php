<?php

namespace App\Models\MarkLayer;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function users(){
	    return $this->belongsToMany(Models\UserLayer\User::class);
    }
}