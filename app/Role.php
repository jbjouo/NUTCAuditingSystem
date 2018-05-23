<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $primaryKey ='Role';
    protected $fillable = [
        'Role','Name',
    ];
    protected $table = "role";
}
