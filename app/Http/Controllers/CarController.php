<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // If we have a route that needs to access data from a request
    // We should pass in the laravel Request object as a param to our method
    public function getAllCars(Request $request)
    {
        // Check to make sure the request has a search before we try search
        if ($request->search) {
            // When you use a model, the first method you call should have ::, all others should have ->
            $cars = Car::whereAny(['make', 'model', 'description'], 'LIKE', "%{$request->search}%")
                ->get()
                ->makeHidden(['seats', 'owned', 'created_at', 'updated_at']);

            return response()->json([
                'message' => 'Cars retrieved',
                'success' => true,
                'data' => $cars
            ]);
        }
        // Using the Car model to get all cars from the DB
        $cars = Car::all()->makeHidden(['seats', 'owned', 'created_at', 'updated_at']);

        return response()->json([
            'message' => 'Cars retrieved',
            'success' => true,
            'data' => $cars
        ]);
    }


    // Because the route for this method has a {id} placeholder, we add a param to the method with a match name
    public function getSingleCar(int $id)
    {
        // That gives us access to the ID from URL within the controller
        // Which we can then feed into our models find method to return the specific car requested
        $car = Car::find($id);

        return response()->json([
            'message' => 'Car retrieved',
            'success' => true,
            'data' => $car
        ]);
    }


    public function add(Request $request)
    {
        // Crucial that we validate all data that comes from $request
        // No matter what it is or what it does
        // It does not matter if your front-end does validation
        // Front end validation is for UX
        // Back end validation is for security
        $request->validate([
            'make' => 'required|string|min:1|max:50',
            'model' => 'required|string|min:1|max:1000',
            'description' => 'string|max:1000',
            'price' => 'required|numeric|min:0',
            'seats' => 'required|numeric|min:1',
            'owned' => 'required|boolean'
        ]);

        // To add a new row to the DB we start by making a new Car
        $car = new Car();
        // We then take the data from the request and put it into the car

        // $car-> matches up with database columns
        // $request-> matches up with data we send with postman
        $car->make = $request->make;
        $car->model = $request->model;
        $car->description = $request->description;
        $car->price = $request->price;
        $car->seats = $request->seats;
        $car->owned = $request->owned;
        // Save the new car into the DB

        if ($car->save()) {
            return response()->json([
                'message' => 'Car added',
                'success' => true
            ], 201);
        }

        // This failure will be rare
        return response()->json([
            'message' => 'Something went wrong',
            'success' => false
        ], 500);
    }


    public function delete(int $id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json([
                'message' => 'Invalid car ID',
                'success' => false
            ], 400);
        }

        if ($car->delete()) {
            return response()->json([
                'message' => 'Car deleted',
                'success' => true
            ]);
        }

        return response()->json([
            'message' => 'Something went wrong',
            'success' => false
        ], 500);
    }


    public function update(int $id, Request $request)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json([
                'message' => 'Invalid car ID',
                'success' => false
            ], 400);
        }

        // ?? is the null coalescing operator
        // If the thing on the left of ??, then use it
        // otherwise use the thing on the right of ??
        $car->make = $request->make ?? $car->make;
        $car->model = $request->model ?? $car->model;
        $car->description = $request->description ?? $car->description;
        $car->price = $request->price ?? $car->price;
        $car->seats = $request->seats ?? $car->seats;
        $car->owned = $request->owned ?? $car->owned;

        if ($car->save()) {
            return response()->json([
                'message' => 'Car updated',
                'success' => true
            ]);
        }

        return response()->json([
            'message' => 'Something went wrong',
            'success' => false
        ], 500);
    }


}
