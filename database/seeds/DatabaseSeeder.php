<?php

use App\Admin;
use App\Car;
use App\CarImage;
use App\Client;
use App\Company;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $accountsQuantity = 5;

        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Admin::truncate();
        Company::truncate();
        Client::truncate();
        Car::truncate();
        DB::table('car_client')->truncate();

        factory(User::class, $accountsQuantity)->create();
        factory(Admin::class, $accountsQuantity)->create();
        factory(Company::class, $accountsQuantity)->create();
        factory(Client::class, $accountsQuantity)->create();
        factory(Car::class, $accountsQuantity)->create()->each(
        function ($car){
        $clients = Client::all()->random()->pluck('id');
        $car->clients()->attach($clients);
        }
        );
        factory(CarImage::class,$accountsQuantity)->create();
    }
}
