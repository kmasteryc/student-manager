<?php

namespace App\Models\ClassLayer;

use Illuminate\Database\Eloquent\Model;

class Cl4ss extends Model
{
    public $table = 'classes';

    public function grade(){
        return $this->belongsTo(Grade::class);
    }
    public function semester(){
        return $this->belongsTo(Semester::class);
    }
    public function scholastic(){
        return $this->belongsTo(Scholastic::class);
    }
}
