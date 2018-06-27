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
}
