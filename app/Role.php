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
    public function hasManypermission()
    {
        return $this->hasMany('App\Permission','Role','Role');
    }
}
