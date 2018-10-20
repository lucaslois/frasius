<?php

use Faker\Generator as Faker;

$factory->define(\App\Quote::class, function (Faker $faker) {
    return [
        'text' => $faker->sentence,
        'author' => $faker->name,
        'source' => $faker->url
    ];
});
