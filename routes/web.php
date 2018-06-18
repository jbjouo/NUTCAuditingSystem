<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

  Auth::routes();
  Route::middleware(['information'])->group(function () {
    //稽核系統
    //主頁(布告欄)

    Route::get('/NUTCAuditing', 'NutcAuditingController@index');

    //權限設定

    Route::get('/permission', 'NutcAuditingController@permision');

    Route::post('permission', 'NutcAuditingController@OneOfThePermision');
    //年度內部稽核計畫主頁
    Route::get('project/index', 'ProjectController@index');

    //新增年度內部稽核計畫
    Route::get('project/create','ProjectController@create');
    Route::post('project/create','ProjectController@add');

    Route::get('project/browse/{id}','ProjectController@item');

    //新增內部稽核計畫表
    Route::get('schedule/create/{id}','ScheduleController@create');
    Route::post('schedule/create/{id}','ScheduleController@add');
    Route::get('schedule/index','ScheduleController@index');
    //個人資訊主頁
    Route::get('information/index', 'InformationController@index');
    Route::get('information/edit', 'InformationController@edit');
    Route::post('information/edit', 'InformationController@update');
  });
  Route::middleware(['preventInfor'])->group(function () {
    //新增個人資訊 若已存在則不會進入
    Route::get('information/create', 'InformationController@create');
    Route::post('information/create', 'InformationController@add');
  });

  Route::get('/register/{Account}&{AuthCode}', 'Auth\RegisterController@EmailValidate');
