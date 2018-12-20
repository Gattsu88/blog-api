<?php

use Faker\Generator as Faker;
use App\Article;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(8, true),
        'body' => $faker->paragraphs(3, true),
        'category_id' => $faker->numberBetween(1, 5),
        'user_id' => $faker->numberBetween(1, 5)
    ];
});
