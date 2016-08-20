<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    public function auction() {
        return $this->belongsTo(Auction::class);
    }

    public function images() {
        return $this->morphMany(Image::class, 'imageable');
    }
}
