<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    protected $table = 'Account';
    public $timestamps = false;
    protected $fillable = ['status'];
}
