<?php

namespace App\Models\UserLayer;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cl4sses(){
        return $this->belongsToMany(\App\Models\ClassLayer\Cl4ss::class);
    }
    public function marks(){
        return $this->hasMany(\App\Models\MarkLayer\Mark::class, 'student_id');
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
}
