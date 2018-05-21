<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey ='Account';


    protected $fillable = [
        'Account','Password','Name', 'Email','AuthCode', 'IsNewMember','Role',
    ];



     public function getAuthPassword()
     {
         return $this->Password;
     }


    protected $hidden = [
        'Password', 'remember_token',
    ];
}
