<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Project;
use App\Schedule;
class pdfController extends Controller
{
    public function pdftest(){
      $project=Project::where('id','1')->get();
      $schedule=Schedule::where('P_id',$project[0]->id)->get();
      foreach ($schedule as $key=> $value) {
        $schedule[$key]->Start_date=date('Y-m', strtotime($value->Start_date));
        $schedule[$key]->End_date = date('Y-m', strtotime($value->End_date));
      }
      PDF::SetFont('stsongstdlight', '', 14);
      PDF::SetTitle('Hello World');
      PDF::AddPage('P');
      PDF::SetMargins(40,0,60);
      PDF::Image(asset('/images/logo.gif'), 140,7,50,15);
      PDF::WriteHTML(view('pdf.project',['data'=>$project])->render());
      PDF::AddPage('L');
      PDF::SetMargins(20,0,20);
      PDF::Image(asset('/images/logo.gif'),230,7,50,15);
      PDF::WriteHTML(view('pdf.schedule',['data'=>$schedule])->render());
      PDF::Output('hello_world.pdf');
      //return view('pdf.schedule',['data'=>$schedule]);
    }
}
