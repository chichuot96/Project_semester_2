<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    protected $table = 'tours';
    use SoftDeletes;
    protected $date = ['deleted_at'];
    public function category() {
        return $this->belongsTo('\App\Category');
    }
    public function destination() {
        return $this->belongsTo('\App\Destination');
    }
}
