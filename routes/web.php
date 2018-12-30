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

/*
|--------------------------------------------------------------------------
| 請求路徑與方法
|--------------------------------------------------------------------------
可取得跟驗證 route, url, method(get post)
*/
Route::get('getRequestPathUrlMethod
', 'RequestController@getRequestPathUrlMethod');

/*
|--------------------------------------------------------------------------
| 取request輸入值的方法
|--------------------------------------------------------------------------
瀏覽
http://127.0.0.1:8000/getInput?input_value=123&input_arr[]=1&input_arr[]=2&empty_input_value=
*/
Route::get('getInput', 'RequestController@getInput');

/*
|--------------------------------------------------------------------------
| 取得及使用舊的輸入值
|--------------------------------------------------------------------------
*/
Route::get('舊輸入', 'RequestController@viewOldInput');
Route::post('舊輸入', 'RequestController@oldInput');

/*
|--------------------------------------------------------------------------
| 上傳檔案request用法
|--------------------------------------------------------------------------
*/
Route::get('上傳檔案', 'RequestController@viewUplodFile');
Route::post('上傳檔案', 'RequestController@uplodFile');