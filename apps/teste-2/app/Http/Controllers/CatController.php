<?php

namespace App\Http\Controllers;

use App\Services\CatService;
use Illuminate\Http\JsonResponse;

class CatController extends Controller
{
    protected $catService;

    public function __construct(CatService $catService)
    {
        $this->catService = $catService;
    }

    public function randomCat(): JsonResponse
    {
        try {
            $cat = $this->catService->getRandomCat();
            return response()->json($cat);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], $e->getCode() ?: 500);
        }
    }
}
