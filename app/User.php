<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey ='id';

    protected $fillable = [
        'Account','Password','Role','Name','Email','AuthCode','IsNewMember'
    ];

    public function getAuthPassword()
    {
        return $this->Password;
    }

    protected $hidden = [
        'Password', 'remember_token',
    ];
    protected $table = "users";

    public function hasOneRole(){
        return $this->hasOne('App\Role','Role','Role');
    }
    public function hasmanyNotification()
    {
      return $this->hasMany('App\Notification','u_id','id')->orderBy('id','desc');
    }
    public function hasOneInformation()
    {
      return $this->hasOne('App\Information','id','id');
    }
    public function hasmanySchedule()
    {
      return $this->hasMany('App\Schedule','U_id','id');
    }
}
