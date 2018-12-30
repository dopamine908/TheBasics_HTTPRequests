<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * 基礎取得request controller範例
     *
     * @param Request $request
     * @param $route_input_value
     */
    public function getRequest(Request $request, $route_input_value) {
        dump($route_input_value);
        dump($request->all());
    }

    /**
     * request方法
     * 可取得跟驗證 route, url, method(get post)
     *
     * @param Request $request
     */
    public function getRequestPathUrlMethod(Request $request) {
        $uri = $request->path();
        dump('route = '.$uri);
        if($request->is('getRequestPathUrlMethod')) {
            dump('route is getRequestPathUrlMethod');
        }
        $url = $request->url();
        $full_url = $request->fullUrl();
        dump('網址不含接收值 = '.$url, '網址含接收值 = '.$full_url);
        $method = $request->method();
        dump('接收方法 = '.$method);
        if($request->isMethod('GET')) {
            dump('method is GET');
        }
    }

    /**
     * 取request輸入值的方法
     *
     * @param Request $request
     */
    public function getInput(Request $request) {
        dump('request取值');
        dump($request->all());
        dump($request->input('input_value'));
        dump($request->input('not_exist_input', '沒找到變數的預設值'));
        //取陣列值
        dump($request->input('input_arr.0'));
        dump($request->input('input_arr.1'));
        dump($request->input('input_arr.*'));
        //查詢特定input
        dump($request->query('input_value'));
        dump($request->query('input_arr'));
        dump($request->query('not_exist_value', '沒找到變數的預設值'));
        dump($request->query());

        dump('-----------------------------------');

        dump('另外取法');
        dump($request->input_value);
        dump($request->input_arr);

        dump('-----------------------------------');

        dump('只取某些值或是不取某些值');
        dump($request->only('input_value'));
        dump($request->only(['input_value', 'empty_input_value']));
        dump($request->except('input_value'));
        dump($request->except(['input_value', 'empty_input_value']));

        dump('-----------------------------------');

        dump('判斷是某有這個輸入');
        dump($request->has('input_value'));
        dump($request->has(['input_value', 'not_exist_value']));

        dump('-----------------------------------');

        dump('判斷是否有這個輸入＋這個輸入是否有值');
        dump($request->filled('input_value'));
        dump($request->filled('empty_input_value'));
    }

    /**
     * 導向old_request頁面
     * 如果有舊的輸入值會顯示
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewOldInput(Request $request) {
        //取得之前輸入過的值
        dump($request->old('even'));
        dump($request->old('odd'));
        return view('old_request');
    }

    /**
     * 將舊的輸入值存到seesion
     * 若不符合規則
     * 則將輸入值一起帶到要redirect的頁面供使用
     *
     * @param Request $request
     * @return $this
     */
    public function oldInput(Request $request) {
        //將input存到seesion中
        $request->flash();
        /**
         * 如果想要只存某個值或是不存某個其他都存
         * $request->flashOnly(['aaaaaa', 'bbbbbb']);
         * $request->flashExcept('ccccc');
         */

        dump($request->session());

        if($request->input('even') % 2 == 1 || $request->input('odd') % 2 == 0) {
            //將舊的input一起帶到新的頁面使用old()呼叫
            return redirect('舊輸入')->withInput();
            /**
             * 如果想要只存某個值或是不存某個其他都存
             *
             * return redirect('form')->withInput(
             *       $request->except('password')
             *   );
             */
        }
    }

    public function viewUplodFile() {
        return view('upload_file');
    }

    /**
     * 上傳檔案request用法
     *
     * @param Request $request
     */
    public function uplodFile(Request $request) {
        //取得檔案
        dump($request->file('upload_file'));
        dump($request->upload_file);

        //取得檔案資訊
        dump('檔案路徑 ＝ '.$request->file('upload_file')->path());
        dump('檔案路徑 ＝ '.$request->upload_file->path());
        dump('副檔名 ＝ '.$request->file('upload_file')->extension());
        dump('副檔名 ＝ '.$request->upload_file->extension());

        //檢驗檔案是否上取得成功
        if($request->hasFile('upload_file')) {
            dump('檔案存在');
        }
        if($request->file('upload_file')->isValid()) {
            dump('檔案存在且有效');

            //儲存上傳檔案
//            $request->upload_file->storage('file_store_path');
//            $request->photo->store('file_store_path', 's3');

            //儲存上傳檔案(另外取名稱)
//            $request->upload_file->storageAs('file_store_path');
//            $request->upload_file->storeAs('file_store_path', 'filename.jpg', 's3');
        }
    }
}
