<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\Employee;
use App\User;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'user_id'=>User::all()->random()->id,
        'manager_id'=>$faker->numberBetween(1,5),
        'PIN'=>$faker->numberBetween(1000,5000),
        'company_id'=>Company::all()->random()->id,
    ];
});
