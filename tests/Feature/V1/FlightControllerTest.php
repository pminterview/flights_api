<?php

namespace Tests\Feature\V1;

use Tests\TestCase;

class FlightControllerTest extends TestCase
{
    public function test_index(): void
    {
        $response = $this->get('/api/v1/flights');

        $response->assertStatus(200);
    }
}
