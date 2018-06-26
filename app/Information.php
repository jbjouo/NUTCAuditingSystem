<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
  protected $fillable = [
      'id','position','date_Arrival','phone','o_id'
  ];
  protected $table = "informations";
  public $timestamps = false;
  public function hasOneOffice()
  {
    return $this->hasOne('App\Offices','id','o_id');
  }
}
