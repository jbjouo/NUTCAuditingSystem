<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class NutcAuditingController extends Controller
{
	public function index(){
		$user = Auth::user();
		return view('NutcAuditing.index',['user'=>$user]);
	}
	public function permision() {

		$user = Auth::user();
		dd($user);
		return view('NutcAuditing.permision',['user'=>$user]);

	}
}
