<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Offices;
use App\User;
use App\Information;
use Auth;

class NoticeController extends Controller
{
    //
    public function index()
    {
      $role=Auth::user()->Role;
      if ($role==3 or $role==5) {
        $infor = array_flatten(Information::select('id')->where('O_id', Auth::user()->hasOneInformation->o_id)->get()->toArray());
        $users = User::wherein('id',$infor)->wherein('Role',[4,2])->get();
        $Schedules = Schedule::where('O_id', Auth::user()->hasOneInformation->o_id)->where('issend' ,'<>',0)->get();
      }
      elseif($role=4) {
        $infor = array_flatten(Information::select('id')->where('O_id', Auth::user()->hasOneInformation->o_id)->get()->toArray());
        $users = User::wherein('id',$infor)->wherein('Role',[4,2])->get();
        $Schedules = Schedule::where('U_id',Auth::user()->id)->where('O_id', Auth::user()->hasOneInformation->o_id)->where('issend' ,'<>',0)->get();
      }


      return view('notice.index',['Schedules'=>$Schedules,'users'=>$users]);
    }
    public function Assigned(Request $request)
    {
      User::find($request->u_id)->update([
        'Role'=>2,
      ]);

      Schedule::find($request->id)->update([
        'U_id' => $request->u_id,
        'Issend' => 2,
      ]);

      return redirect('notice/index');
    }

    public function EmailValidate($Account,$AuthCode)
  	{
  		$result = $this->CheckAuth($Account,$AuthCode);
  		return view('user.RegisterResult',['message'=>$result]);
  	}
  	public function CheckAuth($Account,$AuthCode){
  			$user =User::where('Account',$Account)->first();
  			if ($user->AuthCode == $AuthCode){
  				User::where('Account',$Account)->update(['AuthCode' => '']);
  					return '驗證成功';
  			}else{
  					return  '驗證失敗';
  			}
  	}
}
