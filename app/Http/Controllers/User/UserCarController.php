<?php

namespace App\Http\Controllers\User;

use App\Car;
use App\Http\Controllers\ApiController;
use App\Http\Resources\Car as ResourcesCar;
use App\User;
use Illuminate\Http\Request;

class UserCarController extends ApiController
{
    /**
     * Display a listing of the favourite cars.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //list all cars found in the $user favourite list.
        //the data will contain pivot field in the results so we hide it .
        $cars = $user->cars()->get()->makeHidden(['pivot']);
        return ResourcesCar::collection($cars);
        //return $this->showAll($cars, 200);
    }

    public function show(User $user, Car $car)
    {
        if ($user->cars()->wherePivot('car_id', '=', $car->id)->first() == null) {
            return $this->showMessage("Car not in favourite list", 404);
        } else {
            return $this->showMessage("Car in favourite list", 200);
        }
    }

    /**
     * Store a new favourite car in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $rules = ['car_id' => 'required'];
        $this->validate($request, $rules);
        //the user that want to add $car to the favourite list.
        $car = Car::all()->where('id', $request->car_id);
        if ($car != null && $car->isNotEmpty()) {
            $user->cars()->attach($car, ['created_at' => now(), 'updated_at' => now()]);
            return $this->showMessage('success', 201);
        }
        return $this->showMessage('error', 400);
    }

    /**
     * Remove the specified favourite car from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Car $car)
    {
        $user->cars()->detach($car);
        return $this->showMessage('success', 202);
    }
}
