<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hotel;
use App\Room;
use App\RoomType;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    $hotel = Hotel::find(rand(1,10));
    $roomTypes = RoomType::where('hotel_id', $hotel->id)->pluck('id');
    return [
        'hotel_id' => $hotel->id,
        'room_type_id' => $faker->randomElement($roomTypes),
        'room_number' => rand(1,200)
    ];
});
