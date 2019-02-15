<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Tag::class, function (Faker $faker) {
    $colors = [
        'rgb(0, 218, 195)',
        'rgb(251, 110, 68)',
        'rgb(255, 199, 87)',
        'rgb(0, 0, 0)',
        'rgb(119, 213, 107)',
        'rgb(119, 213, 107)',
        '#7c4dff',
        '#e5f1f6'
    ];

    return [
        'color' => array_random($colors),
    ];
});
