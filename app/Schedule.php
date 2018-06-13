<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'id','P_id','O_id',
    ];
}
