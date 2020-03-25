<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = 'Tour';
    public function category() {
        return $this->belongsTo('\App\Category');
    }
    public function destination() {
        return $this->belongsTo('\App\Destination');
    }
}
