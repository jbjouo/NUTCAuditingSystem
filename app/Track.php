<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
  protected $fillable = [
      'id','c_id','deadline','content','schedule','cost','benefit','reply_time','result'
  ];
  public $timestamps = false;
  public function belongsToCheck()
  {
    return $this->belongsTo('App\Checks','c_id','id');
  }
}
