<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * User Endpoints
 */
Route::name('verify')->get('users/verify/{token}','User\UserController@verify');
Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);
Route::post('users/check-user-credentials', 'User\UserController@checkUserCredentials');
Route::post('users/login', 'User\UserController@getLoginCredentials');
//Add this route to enable user to add cars to favourite list.
Route::resource('users.cars','User\UserCarController',['only' => ['index','store','destroy','show']]);
/**
 * Car Endpoints
 */
Route::resource('cars', 'Car\CarController', ['only' => ['index', 'show']]);
Route::resource('cars.specifications', 'Car\CarSpecificationsController', ['only' => ['index', 'show']]);
//For testing...
Route::resource('cars.images', 'Car\CarImageController', ['only' => ['store']]);
