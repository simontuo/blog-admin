<?php

namespace App\Models;

use App\Models\Traits\Transform;
use App\Scopes\AdminScope;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Transform;

    public static $columns = [
        'name'              => '名称',
        'email'             => '邮箱',
        'email_verified_at' => '验证于',
        'created_format'    => '创建于',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [
        'created_format'
    ];

    /**
     * 模型启动
     *
     * creator fjy
     */
    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        // 加载全局作用域
        static::addGlobalScope(new AdminScope());
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
