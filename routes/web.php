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
    return view('welcome');
});
//會員系統
	//註冊首頁
        Route::get('/register', 'UserController@Register');
        //註冊
        Route::post('/register', 'UserController@newMember');
        //註冊確認
        Route::post('/registerresult', 'UserController@result');
        //住測驗證碼
        Route::get('/register/{Account}&{AuthCode}', 'UserController@EmailValidate');

        //登入
        Route::get('/login', 'UserController@index');
        Route::post('/login', 'UserController@login');
        //登出
        Route::get('/logout', 'UserController@logout');
//稽核系統

        //主頁(布告欄)
        Route::get('/NUTCAuditing', 'NutcAuditingController@index');
        //權限設定
        Route::get('permision', 'NutcAuditingController@permision');
        //年度內部稽核計畫主頁
        Route::get('/NUTCAuditing/project/index','Internal_Audit_ProjectController@index');
        //新增年度內部稽核計畫
        Route::get('/NUTCAuditing/project/create','Internal_Audit_ProjectController@create');
        Route::post('/NUTCAuditing/project/create','Internal_Audit_ProjectController@add');



Route::get('/home', 'HomeController@index')->name('home');
