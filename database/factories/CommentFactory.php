<?php

use Faker\Generator as Faker;
use App\Comment;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(8, true),
        'body' => $faker->sentences(3, true),
        'article_id' => $faker->numberBetween(1, 10),
        'user_id' => $faker->numberBetween(1, 5)
    ];
});
