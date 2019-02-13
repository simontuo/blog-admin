<?php

namespace App\Models;

use App\Models\Traits\Transform;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use Transform;
    public $selection = false;
//    const SELECTION = false;
    protected $table = 'users';

    public static $columns = [
        'name'              => '名称',
        'email'             => '邮箱',
        'email_verified_at' => '验证于',
        'created_at'        => '创建于',
    ];

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
    ];
}
