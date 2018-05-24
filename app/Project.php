<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
        'id','Year','Audit_scope','Audit_focus','Audit_class','Status','NumberOfYear'
    ];
}
