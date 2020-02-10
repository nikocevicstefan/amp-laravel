<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hotel;
use App\Room;
use App\RoomType;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    $hotel = Hotel::find(rand(1,10));
    $roomType = RoomType::where('hotel_id', $hotel->id)->first();
    return [
        'hotel_id' => $hotel->id,
        'room_type_id' => $roomType->id,
        'room_number' => rand(1,200)
    ];
});
