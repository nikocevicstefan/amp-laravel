<?php

use App\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    public function run()
    {
        Country::create([
            'name'=>'Montenegro',
            'alpha2'=>'ME',
            'alpha3' => 'MNE'
        ]);
        Country::create([
            'name'=>'United States',
            'alpha2'=>'US',
            'alpha3' => 'USA'
        ]);
        Country::create([
            'name'=>'United Kingdom',
            'alpha2'=>'GB',
            'alpha3' => 'GBR'
        ]);
        Country::create([
            'name'=>'Germany',
            'alpha2'=>'DE',
            'alpha3' => 'DEU'
        ]);
    }
}
