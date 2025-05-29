<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;

//Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    //Route::apiResource('users', UserController::class)->names('user');
//});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::post('/', [UserController::class, 'store']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

