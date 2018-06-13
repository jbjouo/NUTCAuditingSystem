<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Schedule;
use Auth;
class ScheduleController extends Controller
{
    //
    public function create($id)
    {
      $project = Project::find($id);
      return view('schedule.create',['project' => $project]);
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
    }
}
