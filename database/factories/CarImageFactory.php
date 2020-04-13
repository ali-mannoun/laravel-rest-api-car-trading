<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use App\CarImage;
use Faker\Generator as Faker;

$factory->define(CarImage::class, function (Faker $faker) {
    /*
    return [
        'car_id' => Car::all()->random()->id,
        'image_url' => $faker->randomElement([
            'C:\Users\ASUS\AppData\Local\Temp\84b98a6136e7d43c22840a750585aaf0.jpg',
            'C:\Users\ASUS\AppData\Local\Temp\329e500d283f862495ba888868d19769.jpg',
            'C:\Users\ASUS\AppData\Local\Temp\7d376ef1e7820d2996f22813577c6dae.jpg',
            'C:\Users\ASUS\AppData\Local\Temp\5a5249d20379d2996d09c6f30cc07431.jpg',
            'C:\Users\ASUS\AppData\Local\Temp\78fae485b0fab40e882fcfcfe44aa41c.jpg'
            ]),
    ];
    */
    return [
        'car_id' => Car::all()->random()->id,
        'image_url' => $faker->imageUrl(),
    ];
});
