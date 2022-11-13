<?php

namespace App\Http\Requests\V1\Flight;

use Illuminate\Foundation\Http\FormRequest;

class FlightIndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'per_page' => ['numeric'],
            'page' => ['numeric'],
        ];
    }
}
