<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'email' => 'stefan@mail.com',
          'name' => 'Stefan Nikocevic',
          'password' => '123456',
          'email_verified_at' => now()
        ]);

        $this->call(CountriesTableSeeder::class);
        $this->call(HotelsTableSeeder::class);
        $this->call(RoomTypesTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
    }
}
