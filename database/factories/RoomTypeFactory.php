<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RoomType;
use Faker\Generator as Faker;

$factory->define(RoomType::class, function (Faker $faker) {
    return [
        'hotel_id' => rand(1,10),
        'name' => $faker->word,
        'number_of_beds' => rand(1,3),
        'number_of_rooms' => rand(1,3),
        'number_of_bathrooms' => rand(1,3),
        'max_capacity' => rand(1,8),
        'price_per_night' => rand(1000, 100000),
        'description' => $faker->paragraph
    ];
});
