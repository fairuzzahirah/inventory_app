<?php

use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\ItemController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\UnitController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\MaintenanceRequestController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('units', UnitController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('items', ItemController::class);
    Route::apiResource('users', UserController::class);
    Route::apiResource('maintenance-requests', MaintenanceRequestController::class);
});
