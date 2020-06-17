<?php

namespace App\Http\Controllers\Car;

use App\Car;
use App\Http\Controllers\ApiController;
use App\Http\Resources\Car as ResourceCar;

class CarController extends ApiController
{

    public function index()
    {
        $cars = Car::all();
        return ResourceCar::collection($cars);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Car $car
     * @return \App\Http\Resources\Car
     */
    public function show(Car $car)
    {
        return new ResourceCar($car);
    }

}
