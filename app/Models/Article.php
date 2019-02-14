<?php

namespace App\Models;

use App\Models\Traits\Transform;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Transform;

    public static $columns = [
        'creator'        => '创建人',
        'title'          => '标题',
        'content'        => '正文',
        'created_format' => '创建于',
    ];

    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];

    protected $appends = [
        'creator', 'created_format'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
