<?php

namespace App\Clients;

use Illuminate\Support\Facades\Http;

class CatApiClient
{
    public function fetchRandomCat(): array
    {
        $response = Http::withHeaders([
            'x-api-key' => env('CAT_API_KEY')
        ])->get(env('CAT_API_URL'));

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Erro ao buscar imagem do gato: ' . $response->body(), $response->status());
    }
}
