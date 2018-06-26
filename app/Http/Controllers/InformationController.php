<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;
use App\Offices;
use Auth;
use App\User;
use Hash;
use Validator;

class InformationController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index(){
    $information = Information::find(Auth::user()->id);
    $office = Offices::where('id',$information->o_id)->get();
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
  public function change(){
    return view('information/change');
  }
  public function changepassword(Request $request){
      $user = User::where('id',auth::user()->id)->get();
      $data = $request->only('old','new','newcheck');
       $objValidator = Validator::make($data,[
          'old' => [
              'required',
          ],
          'new' => [
              'required',
              'between:6,20',
              'regex:/^(([a-z]+[0-9]+)|([0-9]+[a-z]+))[a-z0-9]*$/i'
          ],
          'newcheck' =>'required|same:new',
      ],[
          'old.required' => '請輸入舊密碼',
          'new.required' => '請輸入新密碼',
          'new.between' => '新密碼需介於 6-20 字元',
          'new.regex' => '新密碼需包含英文數字',
          'newcheck.required' => '請輸入確認密碼',
          'newcheck.same' => '兩次密碼不相同',
      ]);
       if ($objValidator->fails()){
         return redirect('information/change')
                        ->withErrors($objValidator->errors()->all())
                        ->withInput();
                        }
       else {
         if(Hash::check($request['old'],$user[0]->Password)){
           User::Where('id',auth::user()->id)->update(['Password'=>Hash::make($request['new'])]);
           return view('NutcAuditing/index');
         }else{
           return redirect('information/change');
            }
         }
  }
}
