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
Route::group(['prefix'=>'admin'],function(){
    //后台首页
    Route::get('/index', 'Admin\index\IndexController@index');
    //小说添加
    Route::get('/fictions', 'Admin\index\IndexController@fictions');
    //添加作品
    Route::get('/production', 'Admin\index\IndexController@production');
    Route::post('/productiondo', 'Admin\index\IndexController@productiondo');
    //添加执行
    Route::post('/fictionsdo', 'Admin\index\IndexController@fictionsdo');
    //添加轮播图
    Route::get('/slideshow', 'Admin\index\IndexController@slideshow');
    Route::post('/slideshowdo', 'Admin\index\IndexController@slideshowdo');
    //轮播图展示
    Route::get('/slideshowlist', 'Admin\index\IndexController@slideshowlist');
    //修改状态
    Route::post('/show', 'Admin\index\IndexController@show');
    Route::post('/shows', 'Admin\index\IndexController@shows');
    //后台登入页面
    Route::get('/login', 'Admin\login\LoginController@login');
    //
});
Route::group(['prefix'=>'index'],function(){
    //前台首页
    Route::get('/index', 'Index\index\IndexController@index');
    //前台登入
    Route::get('/logins', 'Index\login\LoginController@logins');
});