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


//首頁
Route::get('/', function () {
    return view('welcome');
});

//會員系統
	//註冊首頁
    Route::group(['middleware' => 'checklogin:out'], function () {
        Route::get('/register', 'MemberController@Register');
        //註冊
        Route::post('/register', 'MemberController@newMember');
        //註冊確認
        Route::post('/registerresult', 'MemberController@result');
        //住測驗證碼
        Route::get('/register/{Account}&{AuthCode}', 'MemberController@EmailValidate');

        //登入
        Route::get('/login', 'MemberController@index');
        Route::post('/login', 'MemberController@login');
    });
    Route::group(['middleware' => 'checklogin:in'], function () {
        //登出
        Route::get('/logout', 'MemberController@logout');
    });
//稽核系統
    Route::group(['middleware' => 'checklogin:in'], function () {
        //主頁(布告欄)
        Route::get('/NUTCAuditing', 'NutcAuditingController@index');
        //年度內部稽核計畫主頁
        Route::get('/NUTCAuditing/project/index','Internal_Audit_ProjectController@index');
        //新增年度內部稽核計畫
        Route::get('/NUTCAuditing/project/create','Internal_Audit_ProjectController@create');
        Route::post('/NUTCAuditing/project/create','Internal_Audit_ProjectController@add');
    });










Route::get('/test','TestController@index');
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
