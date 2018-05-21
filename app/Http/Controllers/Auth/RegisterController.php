<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/NUTCAuditing';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('user.register');
    }
    public function RegisterResult($message)
    {
      return view('user.RegisterResult',['message' => $message]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      $messages =[
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
      ];
         $objValidator = Validator::make($data,[
            'Account' => [
                'required',
                'between:6,20',
                'regex:/^(([a-z]+[0-9]+)|([0-9]+[a-z]+))[a-z0-9]*$/i',
                'unique:users'
            ],
            'Password' => [
                'required',
                'between:6,20',
                'regex:/^(([a-z]+[0-9]+)|([0-9]+[a-z]+))[a-z0-9]*$/i'
            ],
            'CheckPassword' =>'required|same:Password',
            'Name' => 'required|max:20',
            'Email' => 'required|email|max:50'
        ],$messages);

        return $objValidator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      $user = User::create([
        'Account' => $data['Account'],
        'Name' => $data['Name'],
        'Password' => Hash::make($data['Password']),
        'Email' => $data['Email'],
        'AuthCode' => $this -> base62(),
        'IsNewMember' => 1,
        'Role' => 0,
      ]);
      $this -> sendRegisterEmail($data['Account']);

      return $user;
    }
    public function base62(){
        $index = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $res = '';
        for ($x = 1; $x < 10; $x++) {
            $res .= $index[rand(0, strlen($index)-1)];
        }
        return $res;
    }

    public function sendRegisterEmail($Account){
        $member=User::find($Account)->getAttributes();
        if(($member['AuthCode'])!=null){
            //寄信
            //填寫寄信人信箱
            $from = [
                'email'=>'junreal0123@gmail.com',
                'name'=>'稽核系統',
                'subject'=>'稽核系統驗證信'
            ];

            //填寫收信人信箱
            $to = [
                'email'=>$member['Email'],
                'name'=>$member['Name']
            ];

            //信件的內容
            $data = [
                'username' =>$member['Name'],
                'ValidateUrl' =>url("/register/{$member['Account']}&{$member['AuthCode']}")
                 ];
            //寄出信件
            Mail::send('layouts.RegisterEmailTemplate', $data, function($message) use ($from, $to) {
                $message->from($from['email'], $from['name']);
                $message->to($to['email'], $to['name'])->subject($from['subject']);
            });
        }

    }
}
