<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    //
    public function __construct()
  	{
  			$this->middleware('auth');
  	}
    public function index()
    {
      $projects = Project::All();
      return view('project.index',['projects'=>$projects]);
    }
    public function create()
    {
      return view('project.create');
    }
    public function add(Request $request)
    {
      $NumberOfYear = $thisyearproject =Project::where('Year', $request->Year)->get()->count()+1;

      $project = Project::create([
        'Year' =>$request->Year ,
        'Audit_scope'=>$request->Audit_scope,
        'Audit_focus'=>$request->Audit_focus,
        'Audit_class'=>$request->Audit_class,
        'Status' =>'未稽核',
        'NumberOfYear'=> $NumberOfYear,
      ]);
      return redirect('project/index');
    }
    public function item($id)
  	{
      $project = Project::find($id);
  		return view('project.browse',['project'=>$project]);
  	}
    public function test(){
      
    }
}
