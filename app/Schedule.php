<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'id','P_id','O_id','Item_project','Category','Focus','Start_date','End_date','Audit_user','Issend'
    ];
    protected $table = "schedules";
}
