<?php

namespace Database\Seeders;

use App\Models\Flight;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('en');

        for ($i = 0; $i < 10; $i++) {
            Flight::create([
                'airline_iata' => $faker->countryCode(),
                'flight_number' => $faker->randomNumber(4),
                'from_code' => $faker->countryCode(),
                'to_code' => $faker->countryCode(),
                'departure_date_utc' => $faker->dateTimeThisMonth(),
            ]);
        }

    }
}
