<?php

namespace App\Providers;

use App\Mail\UserCreated;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        JsonResource::withoutWrapping();

        //An event to send an email verification once the user is created.
        User::created(function($user){
            Mail::to($user)->send(new UserCreated($user));
        });

    }
}
