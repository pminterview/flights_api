<?php

namespace Tests\Feature\V1\Flight;

use App\Models\V1\Flight\Flight;
use Tests\TestCase;

class FlightControllerTest extends TestCase
{
    public function test_index(): void
    {
        $response = $this->get('/api/v1/flights');

        $response->assertStatus(200);
        $response->assertJsonStructure([
           'data', 'links', 'meta',
        ]);
    }

    public function test_store()
    {
        $params = [
            'airline_iata' => 'FR',
            'flight_number' => 1024,
            'from_code' => 'OTP',
            'to_code' => 'STN',
            'departure_date_utc' => '2022-01-19 09:10:00',
        ];

        $response = $this->post('/api/v1/flights', $params);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'airline_iata',
                'flight_number',
                'from_code',
                'to_code',
                'departure_date_utc',
                'created_at',
                'updated_at',
            ],
            'message',
        ]);
    }

    public function test_update()
    {
        $flight = Flight::create([
            'airline_iata' => 'FR',
            'flight_number' => 1024,
            'from_code' => 'OTP',
            'to_code' => 'STN',
            'departure_date_utc' => '2022-01-19 09:10:00',
        ]);

        $params = [
            'airline_iata' => 'PL',
            'flight_number' => 2048,
            'from_code' => 'OTP',
            'to_code' => 'STN',
            'departure_date_utc' => '2022-01-19 09:10:00',
        ];

        $response = $this->put("/api/v1/flights/$flight->id", $params);
        $response->assertStatus(200);
        $response->assertJsonPath('data.airline_iata', 'PL');
        $response->assertJsonPath('data.flight_number', '2048');
    }
}
