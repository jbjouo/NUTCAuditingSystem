<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Project;
use App\Schedule;
use App\Checks;

class pdfController extends Controller
{
    public function index(){
      $projects = Project::All();
      return view('pdf.index',['projects'=>$projects]);
    }
    public function pdf(Request $request){
      $project=Project::where('id',$request->id)->get();
      $schedule=Schedule::where('P_id',$project[0]->id)->get();
      $s_id=array_flatten(Schedule::select('id')->where('P_id',$project[0]->id)->where('Issend',2)->get()->toArray());
      $checks =Checks::wherein('s_id',$s_id)->get();
      foreach ($schedule as $key=> $value) {
        $schedule[$key]->Start_date=date('Y-m', strtotime($value->Start_date));
        $schedule[$key]->End_date = date('Y-m', strtotime($value->End_date));
      }
      PDF::SetFont('stsongstdlight', '', 14);
      PDF::SetTitle($request->name);
      PDF::AddPage('P');
      PDF::SetMargins(40,0,60);
      PDF::Image(asset('/images/logo.gif'), 140,7,50,15);
      PDF::WriteHTML(view('pdf.project',['data'=>$project])->render());
      $a = array();
      for($i=0;$i<count($schedule);$i++) {
        $a[$i] =$schedule[$i];
        if ($i %10 ==7){
          PDF::AddPage('L');
          PDF::SetMargins(20,0,20);
          PDF::Image(asset('/images/logo.gif'),230,7,50,15);
          PDF::WriteHTML(view('pdf.schedule',['data'=>$a])->render());
          $a = array();
        }
      }

      PDF::AddPage('L');
      PDF::SetMargins(20,0,20);
      PDF::Image(asset('/images/logo.gif'),230,7,50,15);
      PDF::WriteHTML(view('pdf.schedule',['data'=>$a])->render(), true, false, true, false, '');

      PDF::AddPage('L');
      PDF::SetMargins(20,0,20);
      PDF::Image(asset('/images/logo.gif'),230,7,50,15);
      PDF::WriteHTML(view('pdf.check',['data'=>$checks])->render());
      PDF::Output('hello_world.pdf');
      //return view('pdf.test');
    }
}
