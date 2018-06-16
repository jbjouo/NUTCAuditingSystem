<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;
use App\Offices;
class InformationController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index(){
    return view('information.index');
  }
  public function create()
  {
    $offices = Offices::get();
    return view('information.create',['offices'=>$offices]);
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
}
