<?php

namespace App\Http\Resources\V1\Flight;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FlightResourceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => FlightResource::collection($this->collection),
        ];
    }
}
