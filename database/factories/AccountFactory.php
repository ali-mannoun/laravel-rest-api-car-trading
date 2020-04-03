<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Account;
use App\User;
use App\UserType;
use Faker\Generator as Faker;

$factory->define(Account::class, function (Faker $faker) {

    return [
        'user_name'=> $faker->userName,
        'password'=> $faker->password,
        'email'=> $faker->unique()->safeEmail,
        'user_id'=>factory(User::class),
        'verified'=> $verified = $faker->randomElement([Account::VERIFIED_ACCOUNT, Account::UNVERIFIED_ACCOUNT]),
        'verification_token' => $verified == Account::VERIFIED_ACCOUNT ? null :Account::generateVerificationCode(),
    ];
});
