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
}
