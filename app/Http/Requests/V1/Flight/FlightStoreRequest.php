<?php

namespace App\Http\Requests\V1\Flight;

use Illuminate\Foundation\Http\FormRequest;

class FlightStoreRequest extends FormRequest
{
    public function rules(): array
    {
        //
        return [
            'airline_iata' => ['required', 'string',],
            'flight_number' => ['required', 'integer',],
            'from_code' => ['required', 'string',],
            'to_code' => ['required', 'string',],
            'departure_date_utc' => ['required', 'date_format:Y-m-d H:i:s',],
        ];
    }
}
