<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checks extends Model
{
      public $timestamps = false;
      protected $table = "checks";
      protected $fillable = [
          'id','s_id','result','description','supporting_information'
      ];
      public function belongsToSchedule()
      {
        return $this->belongsTo('App\Schedule','s_id','id');
      }
      public function hasOneTrack()
      {
        return $this->hasOne('App\Track','c_id','id');
      }
}
