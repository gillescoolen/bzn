<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Municipality::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'long' => 0,
        'lat' => 0,
    ];
});
