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

/*
|--------------------------------------------------------------------------
| 取得請求
|--------------------------------------------------------------------------
基本取得request方法
嘗試瀏覽網址：
http://webhost/%E5%8F%96%E5%BE%97%E8%AB%8B%E6%B1%82?input_value=123
*/
Route::get('取得請求/{route_input_value}', 'RequestController@getRequest');