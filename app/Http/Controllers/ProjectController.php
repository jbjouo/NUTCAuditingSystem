<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Schedule;
use App\Offices;
use App\user;
use App\Notification;


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
      $Percent = round(($schedules ->count()/$offices_c)*100,2);
  		return view('project.browse',['project'=>$project,'schedules'=>$schedules,'Percent'=>$Percent]);
  	}
    public function announcement($id)
    {
      $project = Project::find($id);
      Project::find($id)->update([
        'Status' => "公告中"
      ]);
      $this ->Notification("all",$project->Year."年度稽核計畫已公告","NUTCAuditing");

      return redirect('project/index');
    }
    public function Notification($value,$content,$url)
    {
      if ($value == "all") {
        $users = User::all();
        for ($i=0; $i < $users->count(); $i++) {
          $notification = Notification::create([
            'u_id'=>$users[$i]->id,
            'content'=>$content,
            'url'=>$url,
            'isread'=>0,
          ]);
        }
      }
    }

}
