<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Offices;
use Auth;
class NoticeController extends Controller
{
    //
    public function index()
    {
      $Schedules = Schedule::where('O_id', Auth::user()->hasOneInformation->o_id)->where('issend' ,'<>',0)->get();
      return view('notice.index',['Schedules'=>$Schedules]);
    }
}
