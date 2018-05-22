<?php

use Faker\Generator as Faker;
use App\Key;

$factory->define(Key::class, function (Faker $faker) {
    return [
        "hash" => $faker->unique()->md5,
        "active" => $faker->boolean
    ];
});
