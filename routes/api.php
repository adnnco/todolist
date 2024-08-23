<?php

use App\Http\Controllers\Api\LabelController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


Route::apiResources([
    'users' => UserController::class,
    'tasks' => TaskController::class,
    'labels' => LabelController::class,
]);
