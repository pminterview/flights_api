<?php

namespace App\Models\V1\Flight;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use Uuid;

    protected $table = 'flights';
    protected $fillable = [
        'airline_iata', 'flight_number', 'from_code', 'to_code', 'departure_date_utc',
    ];
    protected $casts = [
        'departure_date_utc' => 'date',
    ];
}
