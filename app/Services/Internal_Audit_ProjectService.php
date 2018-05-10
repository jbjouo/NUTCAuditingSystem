<?php
/**
 * Created by PhpStorm.
 * User: JBJ
 * Date: 2018/4/18
 * Time: 上午 01:50
 */

namespace App\Services;
use App\internal_audit_projects;

class Internal_Audit_ProjectService
{
    public function GetProjects(){
        $data = internal_audit_projects::all();
        return $data;
    }
}