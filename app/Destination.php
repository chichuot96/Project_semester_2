<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Destination extends Model
{
    use SoftDeletes;
    protected $date = ['deleted_at'];

    public function tours()
    {
        return $this->hasMany('\App\Tour');
    }
    protected $table = 'destinations';
}
