<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use App\User;
use App\Role;
use App\Permission;

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
		$Role = Role::where('Role' ,'<>','5')->where('Role' ,'<>','6')->get();
		$users = User::where('Role' ,'<>','5')->get();
		return view('NutcAuditing.permision',['users'=>$users,'Role'=>$Role]);
	}
	public function OneOfThePermision(Request $request)
	{
		$permission = Permission::where('Role' , $request->role)->get();
		return response()->json(array(
			'permision'=>$permission,
		));
	}
}
