<?php
/**
 * Created by PhpStorm.
 * User: JBJ
 * Date: 2018/4/8
 * Time: 下午 12:05
 */

namespace App\Service;


use App\User;
use Hash;
use Mail;
class userService
{

    public function register($data){

        $user = User::create([
            'Account' => $data['Account'],
            'Name' => $data['Name'],
            'Password' => Hash::make($data['Password']),
            'Email' => $data['Email'],
            'AuthCode' => $this -> base62(),
            'IsNewMember' => 1,
            'Role' => 0,
            'Admin' => 0
        ]);
        $user ->save();
    }
    public function base62(){
        $index = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $res = '';
        for ($x = 1; $x < 10; $x++) {
            $res .= $index[rand(1, strlen($index))];
        }
        return $res;
    }

    public function CheckAuth($Account,$AuthCode){
        $user = User::find($Account);
        if ($user -> AuthCode ==$AuthCode){
            $user -> AuthCode ='';
            $user ->save();
            return '驗證成功';
        }else{
            return  '驗證失敗';
        }
    }

    public function sendRegisterEmail($Account){
        $user=User::find($Account)->getAttributes();
        if(($user['AuthCode'])!=null){
            //寄信
            //填寫寄信人信箱
            $from = [
                'email'=>'junreal0123@gmail.com',
                'name'=>'稽核系統',
                'subject'=>'稽核系統驗證信'
            ];

            //填寫收信人信箱
            $to = [
                'email'=>$user['Email'],
                'name'=>$user['Name']
            ];

            //信件的內容
            $data = [
                'username' =>$user['Name'],
                'ValidateUrl' =>url("/register/{$user['Account']}&{$user['AuthCode']}")
                 ];
            //寄出信件
            Mail::send('layout.RegisterEmailTemplate', $data, function($message) use ($from, $to) {
                $message->from($from['email'], $from['name']);
                $message->to($to['email'], $to['name'])->subject($from['subject']);
            });
        }

    }
}
