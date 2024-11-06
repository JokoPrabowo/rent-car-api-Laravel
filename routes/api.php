<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarsController;
use App\Http\Controllers\Api\DealsController;
use App\Http\Controllers\Api\UsersController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/cars', CarsController::class);

Route::apiResource('/deals', DealsController::class);

Route::apiResource('/users', UsersController::class);
