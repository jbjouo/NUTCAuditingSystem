<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class NutcAuditingController extends Controller
{
	public function __construct()
	{
			$this->middleware('auth');
	}
	public function index(){
		return view('NutcAuditing.index');
	}
	public function permision() {
		return view('NutcAuditing.permision');

	}
}
