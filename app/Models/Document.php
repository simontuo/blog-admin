<?php

namespace App\Models;

use App\Models\Traits\Transform;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use Transform;

    public static $columns = [
        'name'           => '名称',
        'url'            => '地址',
        'icon'           => '图标',
        'description'    => '描述',
        'created_format' => '创建于',
    ];

    protected $fillable = [
        'name',
        'url',
        'icon',
        'description',
    ];

    protected $appends = [
        'created_format'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
