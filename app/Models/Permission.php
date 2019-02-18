<?php

namespace App\Models;

use App\Models\Traits\Transform;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use Transform;

    public static $columns = [
        'name'           => '名称',
        'display_name'   => '显示名称',
        'description'    => '描述',
        'created_format' => '创建于',
    ];

    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];

    protected $appends = [
        'created_format'
    ];

    protected $casts = [

    ];
}
