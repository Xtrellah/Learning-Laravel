<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// CARS
Route::get('/cars', [\App\Http\Controllers\CarController::class, 'getAllCars']);
Route::get('/cars/{id}', [\App\Http\Controllers\CarController::class, 'getSingleCar']);

// PRODUCTS
Route::get('/products', [\App\Http\Controllers\ProductController::class, 'getAllProducts']);
Route::get('/products/{id}', [\App\Http\Controllers\ProductController::class, 'getSingleProduct']);

// CATEGORIES
Route::get('/catagories', [\App\Http\Controllers\CatagoryController::class, 'getAllCatagories']);

// UPDATE
Route::post('/cars', [\App\Http\Controllers\CarController::class, 'add']);
Route::delete('/cars/{id}', [\App\Http\Controllers\CarController::class, 'delete']);
Route::put('/cars/{id}', [\App\Http\Controllers\CarController::class, 'update']);
