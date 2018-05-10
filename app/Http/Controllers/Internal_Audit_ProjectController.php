<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\internal_audit_projects;
use Auth;

class Internal_Audit_ProjectController extends Controller
{
    //
    public function index()
    {
      $user = Auth::user();
      $data = internal_audit_projects::all();
      return view('Internal_Audit_Project.index',['data'=>$data,'user'=>$user]);
    }
}
