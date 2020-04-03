<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name'=>$faker->domainName,
        'description'=>$faker->text,
        'location'=>$faker->text,
        'admin_id'=>Admin::all()->random()->id,
    ];
});
