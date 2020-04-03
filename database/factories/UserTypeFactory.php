<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\UserType;
use Faker\Generator as Faker;

$factory->define(UserType::class, function (Faker $faker) {
    $userId = User::all()->random()->id;

    return [
        'user_id' => $userId,
        'user_type' => $faker->randomElement([UserType::REGULAR_USER, UserType::ADMIN_USER, UserType::EMPLOYEE_USER]),
    ];
});
