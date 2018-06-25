<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
  protected $fillable = [
      'id','u_id','content','url','created_at','updated_at','isread'
  ];
}
