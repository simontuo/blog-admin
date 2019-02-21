<?php

namespace App\Models;

use App\Models\Traits\Transform;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use Transform;

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
        'name'               => '名称',
        'slug'               => '标签',
        'http_method_format' => 'HTTP方法',
        'http_path'          => 'HTTP路径',
        'description'        => '描述',
        'created_format'     => '创建于',
    ];

    protected $fillable = [
        'name',
        'slug',
        'http_method',
        'http_path',
        'description',
    ];

    protected $appends = [
        'http_method_format', 'created_format'
    ];

    protected $casts = [
        'http_method' => 'array',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
}
