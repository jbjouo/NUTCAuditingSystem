<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
//    use Notifiable;

//    /**
//     * The attributes that are mass assignable.
//     *
//     * @var array
//     */
//    protected $fillable = [
//        'name', 'email', 'password',
//    ];
//
//    /**
//     * The attributes that should be hidden for arrays.
//     *
//     * @var array
//     */
//    protected $hidden = [
//        'password', 'remember_token',
//    ];

    protected $primaryKey ='Account';
    protected $fillable = [
        'Name', 'Email', 'Password','Account', 'AuthCode', 'IsNewMember', 'Role', 'Admin'
    ];
    public function getAuthPassword()
    {
        return $this->Password;
    }
    public $timestamps = false;

}
