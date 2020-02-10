<?php

use App\RoomType;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class RoomTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(RoomType::class, 50)->create();
    }
}
