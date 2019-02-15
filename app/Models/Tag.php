<?php

namespace App\Models;

use App\Models\Traits\Transform;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Transform;

    public static $columns = [
        'name'           => '名称',
        'color'          => '颜色',
        'created_format' => '创建于',
    ];

    protected $fillable = [
        'name',
        'color',
    ];

    protected $appends = [
        'created_format'
    ];
}
