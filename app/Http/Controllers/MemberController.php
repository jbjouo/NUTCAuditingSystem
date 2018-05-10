<?php

namespace App\Http\Controllers;

use App\Services\memberService;
use Illuminate\Http\Request;
use Validator;
use Auth;

class MemberController extends Controller
{
    public $memberService;
    public function __construct()
    {
        $this->memberService = new memberService();
    }
    public function Register(){
        return view('Member.Register');
	}
	public function newMember(Request $request){
        $Data = $request ->all();

        //驗證
        $objValidator = Validator::make(
            $Data,
            [
                'Account' => [
                    'required',
                    'between:6,20',
                    'regex:/^(([a-z]+[0-9]+)|([0-9]+[a-z]+))[a-z0-9]*$/i',
                    'unique:members'
                ],
                'Password' => [
                    'required',
                    'between:6,20',
                    'regex:/^(([a-z]+[0-9]+)|([0-9]+[a-z]+))[a-z0-9]*$/i'
                ],
                'CheckPassword' =>'required|same:Password',
                'Name' => 'required|max:20',
                'Email' => 'required|email|max:50'
            ],
            [
                'Account.required' => '請輸入帳號',
                'Account.between' => '帳號需介於6-20字元',
                'Account.regex' => '帳號需包含英文數字',
                'Account.unique' => '帳號已存在',
                'Password.required' => '請輸入密碼',
                'Password.between' => '密碼需介於 6-20 字元',
                'Password.regex' => '密碼需包含英文數字',
                'CheckPassword.required' => '請輸入確認密碼',
                'CheckPassword.same' => '兩次密碼不相同',
                'Name.required' => '請輸入姓名',
                'Name.max' => '姓名不可超過 20 字元',
                'Email.required' => '請輸入信箱',
                'Email.email' => '信箱格式錯誤',
                'Email.max' => '信箱不可超過 50 字元'
            ]
        );

        //驗證錯誤顯示錯誤訊息
        if ($objValidator->fails()) {
            return redirect('register')
                ->withErrors($objValidator,'register');
        }


        //這裡要做存進資料庫!!!!!
        $this->memberService->register($Data);

        //這裡要寄送Email驗證碼
        $this->memberService->sendRegisterEmail($Data['Account']);

        $message = "註冊成功,請到信箱收取驗證信";
        return view('Member.RegisterResult',['message' => $message]);
	}

	public function EmailValidate($Account,$AuthCode){
        $result = $this -> memberService ->CheckAuth($Account,$AuthCode);
        return $result;
    }


	public function index(){
        return view('Member.Login');
    }

    public function login(Request $request){
        if (Auth::attempt(['Account' => $request->Account, 'password' => $request ->Password],true))
        {
            // 已登入成功！！！
            return redirect('/NUTCAuditing');
        }else{
            // 登入失敗！！！
            //驗證登入資料 提示錯誤訊息**********這裡要記得加喔!!
            return redirect('/login');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }




}
