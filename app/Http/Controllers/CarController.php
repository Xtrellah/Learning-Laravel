<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // We create methods in here for each page related to cars
    public function getAllCars()
    {
        // Using the Car model to get all cars from the DB
        $cars = Car::all()->makeHidden(['seats', 'owned', 'created_at', 'updated_at']);

        return $cars;
    }

    // Because the route for this method has a {id} placeholder, we add a param to the method with a match name
    public function getSingleCar(int $id)
    {
        // That gives us access to the ID from URL within the controller
        // Which we can then feed into our models find method to return the specific car requested
        $car = Car::find($id);

        return $car;
    }
}
