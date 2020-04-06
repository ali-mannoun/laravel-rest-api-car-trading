<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use App\Company;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    return [
        'main_image_url' => $faker->randomElement(['C:\Users\ASUS\AppData\Local\Temp\84b98a6136e7d43c22840a750585aaf0.jpg',
            'C:\Users\ASUS\AppData\Local\Temp\329e500d283f862495ba888868d19769.jpg',
            'C:\Users\ASUS\AppData\Local\Temp\7d376ef1e7820d2996f22813577c6dae.jpg',
            'C:\Users\ASUS\AppData\Local\Temp\5a5249d20379d2996d09c6f30cc07431.jpg',
            'C:\Users\ASUS\AppData\Local\Temp\78fae485b0fab40e882fcfcfe44aa41c.jpg']),
        'brand' => $faker->name,
        'model' => $faker->name,
        'generation' => $faker->numberBetween(100, 300),
        'year_of_putting_into_production' => $faker->numberBetween(1900, 2020),
        'year_of_stopping_production' => $faker->numberBetween(2010, 2019),
        'description' => $faker->paragraph(),

        'power' => $faker->randomElement(['20 kW', '647 kW', '80.000 kW']),
        'model_engine' => $faker->randomElement(['Haynes HM10R V8 Engine, Multi', 'Haynes HMV2R Motorcycle Engine, Multi', 'Haynes MWHV2 V-Twin Motorcycle Engine Model, Multi']),
        'maximum_engine_speed' => $faker->randomElement(['7000 rpm', '10.000 rpm', '5000 rpm']),
        'engine_oil_capacity' => $faker->randomElement(['4.5 litres', '5 litres', '3.5 litres']),
        'fuel_system' => $faker->randomElement(['petrol', 'diesel', 'octan']),

        'max_speed' => $faker->randomElement(['129 mph', '150 mph', '170 mph']),
        'acceleration_100km/h' => $faker->randomElement(['9.9 seconds', '10 seconds', '15 seconds']),
        'fuel_consumption' => $faker->randomElement(['50 mpg', '100 mpg', '75 mpg']),
        'co2_emissions' => $faker->randomElement(['128 g/km', '150 g/km', '100 g/km']),

        'seats' => $faker->randomElement([2, 4, 6]),
        'doors' => $faker->randomElement([2, 4]),
        'length' => $faker->randomElement(['4000 mm', '5000 mm', '3500 mm', '4180 mm']),
        'width' => $faker->randomElement(['1000 mm', '1200 mm', '1790 mm']),
        'height' => $faker->randomElement(['1500 mm', '1400 mm', '1650 mm']),
        'max_weight' => $faker->randomElement(['500 kg', '400 kg', '350 kg']),
        'fuel_tank_volume' => $faker->randomElement(['50 litres', '25 litres', '60 litres']),
        'body_type' => $faker->randomElement(['Coupe', 'Wagon', 'MUV/SUV']),

        'brakes' => $faker->randomElement(['standard', 'dual']),
        'number_of_gears' => $faker->randomElement([2, 6, 5]),
        'gear_type' => $faker->randomElement([Car::AUTOMATIC_GEAR, Car::MANUAL_GEAR]),
        'tire_size' => $faker->randomElement(['medium', 'large', 'extra large']),
        'exterior_features' => $faker->text(),
        'interior_features' => $faker->text(),

        'company_id' => Company::all()->random()->id,
    ];
});
