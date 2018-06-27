<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'id','P_id','O_id','U_id','Item_project','Category','Focus','Start_date','End_date','Audit_user','Issend'
    ];
    protected $table = "schedules";
    public function belongsToProject()
    {
        return $this->belongsTo('App\Project','P_id','id');
    }
    public function belongsToUser()
    {
        return $this->belongsTo('App\User','U_id','id');
    }
    public function belongsToAudit_user()
    {
        return $this->belongsTo('App\User','Audit_user','id');
    }
    public function hasOneOffice()
    {
        return $this->hasOne('App\Offices','id','O_id');
    }
    public function hasOneCheck()
    {
      return $this->hasOne('App\Checks','s_id','id');
    }
}
