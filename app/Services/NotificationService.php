<?php

namespace App\Services;

use App\User;
use App\Notification;

class NotificationService {

  public function Notification($value,$id,$content,$url)
  {

    if ($value == "all") {
      $users = User::all();
      $this->send($users,$content,$url);
    }
    if ($value == "some") {
      $users = User::wherein('id', $id)->get();
      $this->send($users,$content,$url);
    }
  }
  public function send($users,$content,$url)
  {
    for ($i=0; $i < $users->count(); $i++) {
      $notification = Notification::create([
        'u_id'=>$users[$i]->id,
        'content'=>$content,
        'url'=>$url,
        'isread'=>0,
      ]);
    }
  }
}
