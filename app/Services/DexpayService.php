<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DexpayService
{
    public function createCheckoutSession(array $data){

        $response = Http::withHeaders([
            "x-api-key" => config('services.dexpay.api_key'),
            "Content-Type" => "application/json"
        ])->post(config('services.dexpay.base_url') . '/api/v1/checkout-sessions', $data);

        return $response->json();
    }
}
