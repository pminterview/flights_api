<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Flight extends Model
{
    protected $table = 'flights';
    protected $fillable = [
        'airline_iata', 'flight_number', 'from_code', 'to_code', 'departure_date_utc',
    ];
    protected $casts = [
        'departure_date_utc' => 'date',
    ];

    public static function booted()
    {
        self::creating(static function(Flight $flight) {
            $flight->id = Str::uuid();
        });
    }
}
