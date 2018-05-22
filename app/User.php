<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey ='id';

    protected $fillable = [
        'Account','Password',
    ];

    public function getAuthPassword()
    {
        return $this->Password;
    }

    protected $hidden = [
        'Password', 'remember_token',
    ];
    protected $table = "users";
}
