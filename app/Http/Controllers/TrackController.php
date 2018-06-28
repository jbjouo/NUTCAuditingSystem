<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Schedule;
use App\Checks;
use App\Track;
use Carbon\Carbon;
use Auth;
class TrackController extends Controller
{
    public function index()
    {
      $projects = Project::where('Status','公告中')->get();
      $p = $projects->first();
      $s_id=array_flatten(Schedule::select('id')->where('P_id',$p->id)->where('Issend',2)->get()->toArray());
      $checks =Checks::wherein('s_id',$s_id)->where('result','<>',1)->get();
      return view('track.index',['projects'=>$projects,'checks'=>$checks,'p_id'=>$p->id]);
    }
    public function index_id($id)
    {
      $projects = Project::where('Status','公告中')->get();
      $s_id=array_flatten(Schedule::select('id')->where('P_id',$id)->where('Issend',2)->get()->toArray());
      $checks =Checks::wherein('s_id',$s_id)->get();
      return view('track.index',['projects'=>$projects,'checks'=>$checks,'p_id'=>$id]);
    }
    public function create($id)
    {
      return view('track.create',['c_id'=>$id]);
    }
    public function add(Request $request,$id)
    {
      $track = Track::create([
        'c_id' =>$id ,
        'deadline'=>$request->deadline,
      ]);
      return redirect('track/index/'.$id);
    }
    public function reply_index()
    {
      $s_id = array_flatten(Schedule::where('U_id',Auth::user()->id)->select('id')->get()->toArray());
      $c_id =array_flatten(Checks::wherein('s_id',$s_id)->select('id')->get()->toArray());
      $tracks = Track::wherein('c_id',$c_id)->get();
      return view('track.reply_index',['tracks'=>$tracks]);
    }
    public function reply($id)
    {
      $track = Track::find($id);
      return view('track.reply',['track'=>$track]);
    }
    public function reply_after(Request $request,$id)
    {
      $mytime =Carbon::now('Asia/Taipei');
      Track::find($id)->update([
        'content' => $request->content,
        'schedule'=>$request->schedule,
        'cost'=>$request->cost,
        'benefit'=>$request->benefit,
        'reply_time' =>$mytime
      ]);
      return redirect('track/reply/index');
    }
    public function browse($id)
    {
      $track = Track::find($id);
      return view('track.browse',['track'=>$track]);
    }
    public function end(Request $request,$id)
    {
      $track = Track::find($id);
      $track->update([
        'result' =>$request->result,
      ]);
      return redirect('track/index');
    }
}
