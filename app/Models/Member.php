<?php

namespace App\Models;

use App\Models\Traits\Transform;
use App\Scopes\MemberScope;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use Transform;

    protected $table = 'users';

    public static $columns = [
        'name'              => '名称',
        'email'             => '邮箱',
        'is_admin_format'   => '管理员',
        'email_verified_at' => '验证于',
        'created_format'    => '创建于',
    ];

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
    ];

    protected $appends = [
        'created_format', 'is_admin_format'
    ];

    protected $casts = [
        'is_admin' => 'boolean',
    ];
}
