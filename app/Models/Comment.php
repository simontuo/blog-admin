<?php

namespace App\Models;

use App\Models\Traits\Transform;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use Transform;
    use SoftDeletes;

    public static $columns = [
        'creator'        => '创建人',
        'content'        => '内容',
        'created_format' => '创建于',
    ];

    protected $fillable = [
        'user_id',
        'commentable_id',
        'commentable_type',
        'content',
    ];

    protected $appends = [
        'creator', 'created_format'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'comment_user')
            ->withTimestamps();
    }
}
