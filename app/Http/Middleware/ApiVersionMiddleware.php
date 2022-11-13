<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiVersionMiddleware
{
    public function handle(Request $request, Closure $next, string $guard)
    {
        // Wydaje mi się, że wersja api powinna być gdzieś trzymana ,łatwy dostęp do tej informacji
        // może być pomocny, natomiast nie jestem przekonany, że nadpisywanie configu jest dobrym pomysłem,
        // może Helper, klasa lub/i funkcja, może singleton który będzie to przechowywał (overkill),
        // chociaż to prosta statyczna informacja, gdybam
        config(['app.api_version' => $guard]);


        // zapewne będziemy chcieli coś zrobić w zależności od wersji api, pewnie w innym middleware Single responsibility principle

        return $next($request);
    }
}
