<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Project;
class pdfController extends Controller
{
    public function pdftest(){
      $data=Project::where('id','2')->get();
      PDF::SetFont('stsongstdlight', '', 14);
      PDF::SetTitle('Hello World');
      PDF::AddPage('P');
      PDF::SetMargins(30,0,30);
      PDF::Image(asset('/images/logo.gif'), 140,7,50,15);
      PDF::WriteHTML(view('pdf.project',['data'=>$data])->render());
      PDF::Output('hello_world.pdf');
      //return view('pdf.project',['data'=>$data]);
    }
}
