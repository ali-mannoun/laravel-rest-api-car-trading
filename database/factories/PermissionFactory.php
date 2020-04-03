<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use App\Employee;
use App\Permission;
use Faker\Generator as Faker;

$factory->define(Permission::class, function (Faker $faker) {
    return [
        'permission_number'=>$faker->numberBetween(1,20),
        'permission_description'=>$faker->text,
    ];
});
