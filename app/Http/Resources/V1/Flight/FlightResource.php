<?php

namespace App\Http\Resources\V1\Flight;

use Illuminate\Http\Resources\Json\JsonResource;

class FlightResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'airline_iata' => $this->airline_iata,
            'flight_number' => (string) $this->flight_number, // w zadaniu zwracany jest string
            'from_code' => $this->from_code,
            'to_code' => $this->to_code,
            'departure_date_utc' => $this->departure_date_utc,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
