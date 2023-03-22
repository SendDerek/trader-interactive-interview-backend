<?php

namespace App\Repositories;

use App\Contracts\BoredApiRepository as BoredApiRepositoryContract;
use Illuminate\Support\Facades\Http;

class BoredApiRepository implements BoredApiRepositoryContract
{
    public const BASE_URI = 'https://www.boredapi.com/api/activity';

    public function getActivity(): array
    {
        $response = Http::get(self::BASE_URI);
        return $response->json();
    }
}
