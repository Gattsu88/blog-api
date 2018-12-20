<?php

use Faker\Generator as Faker;
use App\Category;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'user_id' => $faker->numberBetween(1, 5)
    ];
});
