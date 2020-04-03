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

//create and edit methods to provide a form .
/*
if the user doesn't exist then we use this route to create new empolyee or admin or client
throughout the user_type identifier
 */

/**
 * User Endpoints
 */
Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);
Route::post('users/check-user-credentials', 'User\UserController@checkUserCredentials');
Route::post('users/login', 'User\UserController@getLoginCredentials');
/**
 * Client Endpoints
 */

/**
 * Employee Endpoints
 */

/**
 * Account Endpoints
 */
Route::resource('accounts', 'Account\AccountController', ['except' => ['create', 'edit']]);
/**
 * Admin Endpoints
 */
/*

/**
 * Company Endpoints
 */

/**
 * Car Endpoints
 */
Route::resource('cars', 'Car\CarController', ['only' => ['index', 'show']]);
Route::resource('cars.specifications', 'Car\CarSpecificationsController', ['only' => ['index', 'show']]);
Route::resource('cars.images', 'Car\CarImageController', ['only' => ['store']]);
