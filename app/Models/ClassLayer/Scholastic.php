<?php

namespace App\Models\ClassLayer;

use Illuminate\Database\Eloquent\Model;

class Scholastic extends Model
{
    public function cl4sses(){
        return $this->hasMany(Cl4ss::class);
    }
}
