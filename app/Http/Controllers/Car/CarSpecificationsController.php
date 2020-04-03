<?php

namespace App\Http\Controllers\Car;

use App\Car;
use App\Http\Controllers\ApiController;

class CarSpecificationsController extends ApiController
{

    public function index(Car $car)
    {
        $car_specifications = $car->with('car_images')->get(); //here we get the all car list
        //-1 because the collections counts from 0 , but cars auto_increment key starts from 1
        $specifications = $car_specifications->get($car->id - 1);
        return $this->showOne($specifications, 200);
    }

    public function show($id)
    {
        //
    }
}
