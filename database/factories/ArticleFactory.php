<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Article::class, function (Faker $faker) {
    return [
        'title'   => $faker->realText($maxNbChars = 20, $indexSize = 2),
        'content' => $faker->paragraph,
    ];
});
