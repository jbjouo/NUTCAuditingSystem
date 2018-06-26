<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use App\User;
use App\Role;
use App\Permission;
use App\Project;
use App\Schedule;
use App\Information;
use App\Services\NotificationService;
use Mail;
class NutcAuditingController extends Controller
{
	public $notificationService;
	public function __construct(){
			$this->middleware('auth');
			$this->notificationService = new NotificationService();
	}
	public function index(){
		$projects = Project::where('Status','<>','未稽核')->get();
		return view('NutcAuditing.index',['projects'=>$projects]);
	}
	public function permision() {
		$Role = Role::where('Role' ,'<>','4')->where('Role' ,'<>','5')->where('Role' ,'<>','6')->get();
		return view('NutcAuditing.permission',['Role'=>$Role]);
	}
	public function read(){
		$this->notificationService->read();
		return response()->json(array(
		));;
	}
	public function verification(){
		$information =array_flatten(Information::select('id')->where('position','主管')->get()->toArray());
		$users = User::wherein('id',$information)->where('Role','4')->get();
		return view('NutcAuditing.verification',['uesrs' => $users]);
	}
	public function verification_user(Request $request){
		foreach ($request->cb as $cb) {
			User::find($cb)->update([
				'Role'=>3
			]);
		}
		$this->notificationService->Notification('some',$request->cb,'主管身分已審核','information/index');
		return redirect('verification');
	}
	public function OneOfThePermision(Request $request){
		$permission = Permission::where('Role' , $request->role)->get();
		return response()->json(array(
			'permission'=>$permission,
		));
	}
	public function resend(){
		$member=User::where('Account',Auth::user()->Account)->get();
		if($member[0]->AuthCode==''){
			return redirect('NUTCAuditing');
		}
		return view('user.authResend');
	}
	public function sendAuthEmail(Request $request){
			$member=User::where('Account',$request->Account)->get();
			if(($member[0]->AuthCode)!=null){
					//寄信
					//填寫寄信人信箱
					$from = [
							'email'=>'junreal0123@gmail.com',
							'name'=>'稽核系統',
							'subject'=>'稽核系統驗證信'
					];

					//填寫收信人信箱
					$to = [
							'email'=>$member[0]->Email,
							'name'=>$member[0]->Name
					];

					//信件的內容
					$data = [
							'username' =>$member[0]->Name,
							'ValidateUrl' =>url("/register/{$member[0]->Account}&{$member[0]->AuthCode}")
							 ];
					//寄出信件
					Mail::send('layouts.RegisterEmailTemplate', $data, function($message) use ($from, $to) {
							$message->from($from['email'], $from['name']);
							$message->to($to['email'], $to['name'])->subject($from['subject']);
					});
			}
			return view('user.authResend');
	}

}
