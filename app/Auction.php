<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    public function lots() {
        return $this->hasMany(Lot::class);
    }

    public function images() {
        return $this->morphMany(Image::class, 'imageable');
    }
}

