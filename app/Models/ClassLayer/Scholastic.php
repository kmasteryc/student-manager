<?php

namespace App\Models\ClassLayer;

use Illuminate\Database\Eloquent\Model;

class Scholastic extends Model
{
    public $timestamps = false;
    public $fillable = ['scholastic_from','scholastic_to'];
    public function cl4sses(){
        return $this->hasMany(Cl4ss::class);
    }
}
