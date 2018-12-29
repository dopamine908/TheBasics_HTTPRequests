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
}
