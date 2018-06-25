<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Schedule;
use App\Offices;

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
      $schedules = Schedule::where('P_id', $id)->get();
      $offices_c = Offices::all()->count();
      $Percent = ($schedules ->count()/$offices_c)*100;
  		return view('project.browse',['project'=>$project,'schedules'=>$schedules,'Percent'=>$Percent]);
  	}
}
