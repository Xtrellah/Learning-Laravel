<?php

use Illuminate\Support\Facades\Route;

// Routing allows Laravel to take a request from a user and direct to the controller method responsible for that page
// Same idea as react router

// The routes/web.php file is intended to be used for routes/pages that display HTML
// There is also a routes/console.php file - this is for creating Laravel apps that work in the terminal
// We're not going be doing that


// This is the default route responsible for the Laravel homepage
// It does not use a controller class, instead it uses an anon function
Route::get('/', function () {
    return view('welcome');
});

// All routes take two params
// - url
// - What code to run when the route gets hit by a user

// There are a few different methods we can use to create a route depending on what the route does
// Route::get() - For retrieving data
// Route::post() - For creating new things in the database
// Route::put() - For updating existing things in the database
// Route::delete() - For deleting things from the database


// Linking the URL /cars with the getAllCars method in my CarController class
Route::get('/cars', [\App\Http\Controllers\CarController::class, 'getAllCars']);

// We can also create dynamic routes
// {id} is a placeholder that we can access from within the controller itself
Route::get('/cars/{id}', [\App\Http\Controllers\CarController::class, 'getSingleCar']);


// PRODUCTS
Route::get('/products', [\App\Http\Controllers\ProductController::class, 'getAllProducts']);
Route::get('/products/{id}', [\App\Http\Controllers\ProductController::class, 'getSingleProduct']);

