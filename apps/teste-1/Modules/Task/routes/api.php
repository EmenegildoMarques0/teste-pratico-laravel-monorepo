<?php

use Illuminate\Support\Facades\Route;
use Modules\Task\Http\Controllers\TaskController;


    Route::apiResource('tasks', TaskController::class)->names('task');

