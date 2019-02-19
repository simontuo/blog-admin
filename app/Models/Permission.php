<?php

namespace App\Models;

use App\Models\Traits\Transform;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use Transform;
    use SoftDeletes;

    const HTTP_METHOD_GET = 'get';
    const HTTP_METHOD_POST = 'post';
    const HTTP_METHOD_PUT = 'put';
    const HTTP_METHOD_DELETE = 'delete';
    const HTTP_METHOD_PATCH = 'patch';
    const HTTP_METHOD_OPTIONS = 'options';

    public static $httpMethodMap = [
        self::HTTP_METHOD_GET,
        self::HTTP_METHOD_POST,
        self::HTTP_METHOD_PUT,
        self::HTTP_METHOD_DELETE,
        self::HTTP_METHOD_PATCH,
        self::HTTP_METHOD_OPTIONS,
    ];

    public static $columns = [
        'name'           => '名称',
        'display_name'   => '显示名称',
        'http_method'    => 'HTTP方法',
        'http_path'      => 'HTTP路径',
        'description'    => '描述',
        'created_format' => '创建于',
    ];

    protected $fillable = [
        'name',
        'display_name',
        'http_method',
        'http_path',
        'is_banned',
        'description',
    ];

    protected $appends = [
        'created_format'
    ];

    protected $casts = [
        'is_banned' => 'boolean'
    ];

    protected $dates = [
        'deleted_at'
    ];
}
