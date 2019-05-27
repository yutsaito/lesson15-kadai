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





//Route::get('/', 'TasksController@index');


//tasklistにloginをつけるにあたり、再度、welcomeに最初導く、そこのボタンでloginn後にINDEXnIいく
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'TasksController@index');

// CRUD
// メッセージの個別詳細ページ表示
//Route::get('tasks/{id}', 'TasksController@show');
// メッセージの新規登録を処理（新規登録画面を表示するためのものではありません）
//Route::post('tasks', 'TasksController@store');
// メッセージの更新処理（編集画面を表示するためのものではありません）
//Route::put('tasks/{id}', 'TasksController@update');
// メッセージを削除
//Route::delete('tasks/{id}', 'TasksController@destroy');

// index: showの補助ページ
//Route::get('tasks', 'TasksController@index')->name('tasks.index');
// create: 新規作成用のフォームページ
//Route::get('tasks/create', 'TasksController@create')->name('tasks.create');
// edit: 更新用のフォームページ
//Route::get('tasks/{id}/edit', 'TasksController@edit')->name('tasks.edit');


Route::resource('tasks', 'TasksController');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ユーザ機能
Route::group(['middleware' => ['auth']], function () {
    Route::resource('tasks', 'TasksController', ['only' => ['index', 'show']]);    
});






