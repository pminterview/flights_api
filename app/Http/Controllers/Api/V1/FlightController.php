<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Flight\FlightStoreRequest;
use App\Http\Requests\V1\Flight\FlightUpdateRequest;
use App\Http\Resources\V1\FlightResource;
use App\Models\Flight;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FlightController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return FlightResource::collection(Flight::paginate());
    }

    public function store(FlightStoreRequest $flightStoreRequest)
    {
        //todo
    }

    public function update(Flight $flight, FlightUpdateRequest $flightUpdateRequest)
    {
        //todo
    }
}
