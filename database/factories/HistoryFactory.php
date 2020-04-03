<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use App\Employee;
use App\History;
use Faker\Generator as Faker;

$factory->define(History::class, function (Faker $faker) {
    return [
        'employee_id'=>Employee::all()->random()->id,
        'car_id'=>Car::all()->random()->id,
        'action'=>$faker->name,
    ];
});
