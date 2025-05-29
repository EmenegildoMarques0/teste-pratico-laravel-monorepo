<?php

namespace App\Services;

use App\Clients\CatApiClient;

class CatService
{
    protected $catApi;

    public function __construct(CatApiClient $catApi)
    {
        $this->catApi = $catApi;
    }

    public function getRandomCat()
    {
        return $this->catApi->fetchRandomCat();
    }
}
