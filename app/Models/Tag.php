<?php

namespace App\Models;

use App\Models\Traits\Transform;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use Transform;
    use SoftDeletes;

    public static $columns = [
        'name'             => '名称',
        'color'            => '颜色',
        'is_banned_format' => '禁用',
        'created_format'   => '创建于',
    ];

    protected $fillable = [
        'name',
        'color',
        'is_banned',
    ];

    protected $appends = [
        'created_format', 'is_banned_format'
    ];

    protected $casts = [
        'is_banned' => 'boolean',
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class)->withTimestamps();
    }

    public function resources()
    {
        return $this->belongsToMany(Resource::class)->withTimestamps();
    }

    public function documents()
    {
        return $this->belongsToMany(Document::class)->withTimestamps();
    }
}
