<?php

namespace App\Models;

use App\Models\Traits\Transform;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use Transform;

    public static $columns = [
        'name'             => '名称',
        'display_name'     => '显示名称',
        'is_banned_format' => '禁用',
        'description'      => '描述',
        'created_format'   => '创建于',
    ];

    protected $fillable = [
        'name',
        'display_name',
        'is_banned',
        'description',
    ];

    protected $appends = [
        'created_format', 'is_banned_format'
    ];

    protected $casts = [
        'is_banned' => 'boolean',
    ];
}
