<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offices extends Model
{
  protected $fillable = [
      'id','name', 'level', 'supervisior', 'upper_office', 
  ];
  protected $table = "offices";
}
