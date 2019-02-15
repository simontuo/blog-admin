<?php

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

if (! function_exists('user')) {
    /**
     * [user 获取登录用户 helper function]
     *
     * author SimonTuo
     * @param null $driver
     * @return mixed
     */
    function user ($driver = null) {
        // api 获取用户
        if ($driver) {
            return app('auth')->guard('api')->user();
        }
        return app('auth')->user();
    }
}