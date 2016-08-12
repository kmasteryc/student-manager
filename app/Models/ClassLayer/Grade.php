<?php

namespace App\Models\ClassLayer;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function cl4sses(){
        return $this->hasMany(Cl4ss::class);
    }
    public function scholastic(){
        return $this->belongsTo(Scholastic::class);
    }
}
