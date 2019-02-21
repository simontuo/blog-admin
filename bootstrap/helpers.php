<?php

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

if (!function_exists('user')) {
    /**
     * [user 获取登录用户 helper function]
     *
     * author SimonTuo
     * @param null $driver
     * @return mixed
     */
    function user($driver = null)
    {
        // api 获取用户
        if ($driver) {
            return app('auth')->guard('api')->user();
        }
        return app('auth')->user();
    }
}

if (!function_exists('getTransferData')) {
    /**
     * 获取穿梭框数据
     *
     * creator fjy
     * @param $collection
     * @return mixed
     * @throws Exception
     */
    function getTransferData($collection)
    {
        if (is_array($collection)) {
            throw new \Exception('被转换数据必须为集合');
        }

        return $collection->map(function ($item) {
            return [
                'key'         => $item->id,
                'label'       => $item->display_name ?? $item->name,
                'description' => $item->description ?? '',
                'disabled'    => $item->is_banned ?? false,
            ];
        });
    }
}