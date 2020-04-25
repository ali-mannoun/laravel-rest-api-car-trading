<?php

use App\Admin;
use App\Car;
use App\CarImage;
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

        //We don't need to create events when seeding .
        User::flushEventListeners();

        $accountsQuantity = 5;

        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Admin::truncate();
        Company::truncate();
        Car::truncate();
        CarImage::truncate();
        DB::table('car_user')->truncate();

        factory(User::class, $accountsQuantity)->create();
        factory(Admin::class, $accountsQuantity)->create();
        factory(Company::class, $accountsQuantity)->create();
        factory(Car::class, $accountsQuantity)->create()->each(
        function ($car){
        $users = User::all()->random()->pluck('id');
        $car->users()->attach($users);
        });
        factory(CarImage::class,$accountsQuantity)->create();
    }
}
