<?php
/**
 * Created by PhpStorm.
 * User: SimonTuo
 * Date: 2019/2/12
 * Time: 8:32 PM
 */

namespace App\Models\Traits;

trait Transform
{
    public static function transformColumn()
    {
        $selection = [
            'type'  => 'selection',
            'width' => 60,
            'align' => 'center',
        ];

        $index = [
            'type'  => 'index',
            'width' => 60,
            'align' => 'center',
        ];

        return collect([$selection, $index])->merge(collect(self::$columns)->map(function ($item, $key) {
            return [
                'title'   => $item,
                'key'     => $key,
                'tooltip' => true,
                'align'   => 'center'
            ];
        })->values());
    }

    /**
     * 创建于
     *
     * author SimonTuo
     * @return mixed
     */
    public function getCreatedFormatAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * 创建者
     *
     * author SimonTuo
     * @return mixed
     */
    public function getCreatorAttribute()
    {
        return $this->user->name;
    }

    /**
     * 类型
     *
     * author SimonTuo
     * @return mixed
     */
    public function getTypeFormatAttribute()
    {
        return self::$typeMap[$this->type];
    }

    /**
     * 是否公开
     *
     * author SimonTuo
     * @return string
     */
    public function getIsPublicFormatAttribute()
    {
        return $this->is_public ? '是' : '否';
    }

    /**
     * 是否禁用
     *
     * author SimonTuo
     * @return string
     */
    public function getIsBannedFormatAttribute()
    {
        return $this->is_banned ? '是' : '否';
    }
}