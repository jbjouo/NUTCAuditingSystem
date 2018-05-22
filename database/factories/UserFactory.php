<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
      'Account' => math_beuse::rand(),
      'Password' => bcrypt('a123123'),
      'Name' => $faker->name,
      'Email' => $faker->unique()->safeEmail,
      'AuthCode' => math_beuse::base62(),
      'IsNewMember' => 1,
      'Role' => 0,
    ];
});

class math_beuse{
  public static function base62(){
      $index = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $res = '';
      for ($x = 1; $x < 10; $x++) {
          $res .= $index[rand(0, strlen($index)-1)];
      }
      return $res;
  }
  public static function rand(){
      $index1 = '12';
      $index2 = '0123456789';
      $res = 'L';
      $res .= $index1[rand(0, strlen($index1)-1)];

      for ($x = 1; $x <= 8; $x++) {
          $res .= $index2[rand(0, strlen($index2)-1)];
      }
      return $res;
  }
}
