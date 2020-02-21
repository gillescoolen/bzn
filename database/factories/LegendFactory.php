<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Legend::class, function (Faker $faker) {
    return [
        'label' => $faker->realtext(15, 1),
        'color' => $faker->hexcolor
    ];
});