<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Municipality::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'long' => $faker->randomFloat(6, 4, 7),
        'lat' => $faker->randomFloat(6, 50, 54)
    ];
});
