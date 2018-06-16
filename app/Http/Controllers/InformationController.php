<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;
use App\Offices;
use Auth;
class InformationController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index(){
    $information = Information::where('id',Auth::user()->id)->get();
    $office = Offices::where('id',$information[0]->o_id)->get();
    return view('information.index',['information'=>$information,'office'=>$office]);
  }
  public function create()
  {
    $offices = Offices::get();
    return view('information.create',['offices'=>$offices]);
  }
  public function add(Request $request)
  {
    Information::create([
      'id' =>Auth::user()->id  ,
      'position'=>$request->position,
      'date_Arrival'=>$request->date_Arrival,
      'phone'=>$request->phone,
      'o_id'=> $request->o_id,
    ]);

    return redirect('information/index');
  }
  public function edit(){
    $information = Information::where('id',Auth::user()->id)->get();
    $offices = Offices::get();
    return view('information.edit',['information'=>$information,'offices'=>$offices]);
  }
  public function update(Request $request){
    Information::where('id', Auth::user()->id)->update([
      'position'=>$request->position,
      'date_Arrival'=>$request->date_Arrival,
      'phone'=>$request->phone,
      'o_id'=> $request->o_id,
    ]);
    return redirect('information/index');
  }

}
