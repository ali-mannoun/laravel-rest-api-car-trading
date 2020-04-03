<?php

use App\Account;
use App\Admin;
use App\Car;
use App\CarImage;
use App\Client;
use App\Company;
use App\Employee;
use App\History;
use App\Permission;
use App\User;
use App\UserType;
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
        Account::truncate();
        UserType::truncate();
        Admin::truncate();
        Company::truncate();
        Employee::truncate();
        Permission::truncate();
        Client::truncate();
        Car::truncate();
        History::truncate();
        DB::table('car_client')->truncate();
        DB::table('admin_permission')->truncate();
        DB::table('employee_permission')->truncate();

        //factory(User::class, $usersQuantity)->create(); // created in account factory.
        factory(Account::class,$accountsQuantity)->create();
        factory(Permission::class,$accountsQuantity)->create();
        factory(UserType::class,$accountsQuantity)->create();
        factory(Admin::class,$accountsQuantity)->create()->each(
            function($admin){
                $permissions = Permission::all()->random()->pluck('id');
                $admin->permissions()->attach($permissions);
            }
        );
        factory(Company::class,$accountsQuantity)->create();
        factory(Employee::class,$accountsQuantity)->create()->each(
            function($employee){
                $permissions = Permission::all()->random()->pluck('id');
                $employee->permissions()->attach($permissions);
            }
        );
        factory(Client::class,$accountsQuantity)->create();
        factory(Car::class,$accountsQuantity)->create()->each(
            function ($car){
                $clients = Client::all()->random()->pluck('id');
                $car->clients()->attach($clients);
            }
        );
        factory(History::class,$accountsQuantity)->create();
        factory(CarImage::class,$accountsQuantity)->create();
    }
}
