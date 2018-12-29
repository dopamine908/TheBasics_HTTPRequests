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
}
