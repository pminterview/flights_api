<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Flight\FlightIndexRequest;
use App\Http\Requests\V1\Flight\FlightStoreRequest;
use App\Http\Requests\V1\Flight\FlightUpdateRequest;
use App\Http\Resources\V1\Flight\FlightResource;
use App\Http\Resources\V1\Flight\FlightResourceCollection;
use App\Models\V1\Flight\Flight;
use Symfony\Component\HttpFoundation\JsonResponse;

class FlightController extends Controller
{
    const PER_PAGE = 10;

    public function index(FlightIndexRequest $request): FlightResourceCollection
    {
        $perPage = $request->per_page ?? self::PER_PAGE;

        // moglibyśmy użyć FlightResource::collection(Flight::paginate($perPage))
        // ale w ten sposób mamy większą kontrolę nad kolekcją
        //  jeśli byśmy chcieli np. modyfikować meta data ->additional()
        return new FlightResourceCollection(Flight::paginate($perPage));
    }

    public function store(FlightStoreRequest $flightStoreRequest): JsonResponse
    {
        $flight = Flight::create($flightStoreRequest->validated());

        return (new FlightResource($flight))->additional([
            'message' => __('flight.messages.stored'),
        ])->response()->setStatusCode(200);
    }

    public function update(Flight $flight, FlightUpdateRequest $flightUpdateRequest): FlightResource
    {
        $flight->update($flightUpdateRequest->validated());
        return (new FlightResource($flight))->additional([
            'message' => __('flight.messages.updated'),
        ]);
    }
}
