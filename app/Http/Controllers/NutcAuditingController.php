<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class NutcAuditingController extends Controller
{
	public function index(){
				$a=1;
        $user = Auth::user();
        return view('NutcAuditing.index',['user'=>$user]);
	}
}
