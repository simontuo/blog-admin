<?php

namespace App\Models;

use App\Models\Traits\Transform;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Transform;

    const TYPE_CARRY = 'carry';
    const TYPE_ORIGINAL = 'original';

    public static $typeMap = [
        self::TYPE_CARRY    => '搬运',
        self::TYPE_ORIGINAL => '原创',
    ];

    public static $columns = [
        'creator'          => '创建人',
        'is_public_format' => '公开',
        'type_format'      => '类型',
        'title'            => '标题',
        'content'          => '正文',
        'created_format'   => '创建于',
    ];

    protected $fillable = [
        'user_id',
        'type',
        'title',
        'content',
        'is_public',
    ];

    protected $appends = [
        'type_format', 'creator', 'created_format', 'is_public_format'
    ];

    protected $casts = [
        'is_public' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
