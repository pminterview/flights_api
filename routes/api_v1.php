<?php

use Illuminate\Support\Facades\Route;

//podstawowa konfiguracja route prefix, namespace itp jest w RouteServiceProvider


Route::resource('flights', FlightController::class)
    ->parameter('flight', 'flight:uuid')
    ->except(['edit', 'destroy', 'create', 'show']);
