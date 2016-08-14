<?php

namespace App\Models\ClassLayer;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    public $timestamps = false;
    public $fillable = ['semester_name'];
    public function cl4sses(){
        return $this->hasMany(Cl4ss::class);
    }
}
