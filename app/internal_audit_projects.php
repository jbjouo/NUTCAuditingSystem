<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class internal_audit_projects extends Model
{
    //
    protected $fillable = [
        'Id', 'Audit_scope', 'Audit_focus','Audit_class', 'CreateTime', 'UpdateTime', 'Count', 'CreateAccount','Status','AnnouncementTime'
    ];
}
