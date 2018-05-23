<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function __construct()
  	{
  			$this->middleware('auth');
  	}
    public function index()
    {
      return view('project.index');
    }
    public function create()
    {
      return view('project.create');
    }
    public function add(Request $request)
    {
      dd($request);
      return redirect('project/index');
    }
}
