<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\ProfileController;
use Illuminate\Support\Facades\Route;

Route::post('/login', LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', ProfileController::class);
    Route::post('/logout', LogoutController::class);
});


// Route::group(['prefix' => 'v1'], function () {
//     $api = app()->make(\Dingo\Api\Routing\Router::class);

//     $api->version('v1', ['namespace' => 'App\Http\Controllers\Api'], function ($api) {
//         $api->post('users/register', 'UsersController@store');
//         $api->post('users/login', 'UsersController@login');
//     });
// });
