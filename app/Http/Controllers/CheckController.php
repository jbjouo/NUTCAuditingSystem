<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Schedule;
use App\Checks;
class CheckController extends Controller
{
  public function index()
  {
    $projects = Project::where('Status','公告中')->get();
    $p = $projects->first();
    $schedules=Schedule::where('P_id',$p->id)->where('Issend',2)->get();
    return view('check.index',['projects'=>$projects,'schedules'=>$schedules,'p_id'=>$p->id]);
  }
  public function index_id($id)
  {
    $projects = Project::where('Status','公告中')->get();
    $schedules=Schedule::where('P_id',$id)->where('Issend',2)->get();
    return view('check.index',['projects'=>$projects,'schedules'=>$schedules,'p_id'=>$id]);
  }
  public function create($id)
  {
    $schedule=Schedule::find($id);
    $project = Project::find($schedule->P_id);
    return view('check.create',['project'=>$project,'schedule'=>$schedule]);
  }
  public function add(Request $request,$id)
  {
    $Check = Checks::create([
      's_id' =>$id ,
      'result'=>$request->result,
      'description'=>$request->description,
      'supporting_information'=>$request->file->getclientoriginalname()
    ]);

    try{
        $destinationPath = public_path().'/supporting_information/'.'/C_'.$Check->id.'/';
        $filename = $request->file->getClientOriginalName();
        $filetype=$request->file->getMimeType();
        $request->file('file')->move($destinationPath,$filename);
    }
    catch (\Exception $e){
        return "發生錯誤";
    }


    return redirect('check/index/'.$request->id);
  }

  public function browse($id)
  {
    $check =Checks::find($id);
    return view('check.browse',['check'=>$check]);
  }
  public function download($id,$file)
  {
    $destinationPath = public_path().'/supporting_information/'.'C_'.$id.'/'.$file;
    return response()->download($destinationPath);
  }


}
