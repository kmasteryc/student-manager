<?php

namespace App\Models\UserLayer;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	public $fillable = ['role_name'];
	public $timestamps = false;
	
    public function users(){
        return $this->hasMany(\App\User::class);
    }
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }
}
