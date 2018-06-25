<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Schedule;
use App\Offices;
use Auth;
use Route;
class ScheduleController extends Controller
{
    //
    public function index()
    {
      $projects = Project::all();
      $p = $projects->first();
      $schedules = Schedule::where('P_id',$p->id)->get();
      return view('schedule.index',['projects' => $projects,'schedules'=>$schedules,'p_id'=>$p->id]);
    }
    public function index_id($id)
    {
      $projects = Project::all();
      $schedules = Schedule::where('P_id',$id)->get();
      return view('schedule.index',['projects' => $projects,'schedules'=>$schedules,'p_id'=>$id]);
    }

    public function GetSchedule(Request $request)
  	{
      $schedules = Schedule::where('P_id', $request->id)->get();
  		return response()->json(array(
  			'schedules'=>$schedules,
  		));
  	}
    public function create($id)
    {
      $project = Project::find($id);
      $schedules = array_flatten(Schedule::select('O_id')->where('P_id',$id)->get()->toArray());
      $offices = Offices::whereNotIn('id',$schedules)->get();
      return view('schedule.create',['project' => $project,'offices'=>$offices]);
    }
    public function add(Request $request,$id)
    {
      $Item_project=Schedule::where('P_id', $id)->get()->count()+1;
      $schedule = Schedule::create([
        'P_id' =>$id ,
        'O_id'=>$request->O_id,
        'Item_project'=>$Item_project,
        'Category'=>$request->Category,
        'Focus'=>$request->Focus,
        'Start_date'=>$request->start_date,
        'End_date' =>$request->end_date,
        'Audit_user' =>Auth::user()->id,
        'Issend'=> 0,
      ]);

      return redirect()->to('schedule/index/'.$id);
    }
}
