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


Route::get('/home', 'HomeController@index')->name('home');

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
