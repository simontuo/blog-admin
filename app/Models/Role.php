<?php

namespace App\Models;

use App\Models\Traits\Transform;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use Transform;

    public static $columns = [
        'name'             => '名称',
        'slug'             => '标签',
        'is_banned_format' => '禁用',
        'description'      => '描述',
        'created_format'   => '创建于',
    ];

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    protected $appends = [
        'created_format', 'is_banned_format'
    ];

    protected $casts = [

    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }
}
