<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hotel;
use Faker\Generator as Faker;

$factory->define(Hotel::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->paragraph,
        'star' => $faker->numberBetween(1,5),
        'street_address' => $faker->address,
        'city' => $faker->city,
        'country_id' => $faker->numberBetween(1,4)
    ];
});
