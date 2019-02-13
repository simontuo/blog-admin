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
                'tooltip' => true
            ];
        })->values());
    }

    public function getCreatedFormatAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}