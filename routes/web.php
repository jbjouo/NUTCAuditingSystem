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
Route::get('resend','NutcAuditingController@resend');
Route::post('sendAuthEmail','NutcAuditingController@sendAuthEmail');
     Route::middleware(['authCheck'])->group(function () {
      Route::middleware(['information'])->group(function () {

        //稽核系統
        //主頁(布告欄)

        Route::get('/NUTCAuditing', 'NutcAuditingController@index');

        //個人資訊主頁
        Route::get('information/index', 'InformationController@index');
        Route::get('information/edit', 'InformationController@edit');
        Route::post('information/edit', 'InformationController@update');
        //修改密碼
        Route::get('information/change','InformationController@change');
        Route::post('information/change','InformationController@changepassword');

        //權限設定
        Route::get('/verification', 'NutcAuditingController@verification');
        Route::post('/verification', 'NutcAuditingController@verification_user');
        Route::get('/permission', 'NutcAuditingController@permision');
        Route::post('permission', 'NutcAuditingController@OneOfThePermision');
        //通知已讀
        Route::post('read', 'NutcAuditingController@read');
        //年度內部稽核計畫主頁
        Route::get('project/index', 'ProjectController@index');
        //新增年度內部稽核計畫
        Route::get('project/create','ProjectController@create');
        Route::post('project/create','ProjectController@add');
        Route::get('project/browse/{id}','ProjectController@item');
        Route::get('project/announcement/{id}','ProjectController@announcement');
        //新增內部稽核計畫表
        Route::get('schedule/create/{id}','ScheduleController@create');
        Route::post('schedule/create/{id}','ScheduleController@add');
        Route::get('schedule/index','ScheduleController@index');
        Route::get('schedule/index/{id}','ScheduleController@index_id');
        Route::post('Schedule/notice', 'ScheduleController@notice');
        //內部稽核通知單
        Route::get('notice/index','NoticeController@index');
        Route::post('notice/Assigned/{id}','NoticeController@Assigned');
        //內部稽核查檢表
        Route::get('check/index','CheckController@index');







      });
      Route::middleware(['preventInfor'])->group(function () {
        //新增個人資訊 若已存在則不會進入
        Route::get('information/create', 'InformationController@create');
        Route::post('information/create', 'InformationController@add');
      });



  });
Route::get('/register/{Account}&{AuthCode}', 'Auth\RegisterController@EmailValidate');
