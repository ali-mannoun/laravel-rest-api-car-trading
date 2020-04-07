<?php

namespace App\Http\Controllers\User;

use App\Car;
use App\Http\Controllers\ApiController;
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
    }

    /**
     * Store a new favourite car in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, Car $car)
    {
        //the user that want to add $car to the favourite list.
    }

    /**
     * Remove the specified favourite car from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Car $car)
    {
        //the user that want to delete the $car from the favourite list.
    }
}
