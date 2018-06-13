<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
class ScheduleController extends Controller
{
    //
    public function create($id)
    {
      $project = Project::find($id);
      return view('schedule.create',['project' => $project]);
    }
}
