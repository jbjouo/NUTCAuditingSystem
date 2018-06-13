<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
  protected $fillable = [
      'id','position','date_Arrival','phone','o_id'
  ];
  protected $table = "informations";
}
