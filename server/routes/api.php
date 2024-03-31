<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\ProfileController;
use App\Http\Controllers\Api\Frontend\HomeController;
use App\Http\Controllers\Api\Main\AboutController;
use App\Http\Controllers\Api\Main\ServiceController;
use Illuminate\Support\Facades\Route;


/* Frontend apis */

// landing page api
Route::get('/home', HomeController::class);


// login api
Route::post('/auth/login', LoginController::class);

// auth protected route
Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
    // Profile api
    Route::get('/profile', ProfileController::class);
    // logout api
    Route::post('/logout', LogoutController::class);

    // About api
    Route::controller(AboutController::class)->group(function () {
        // About Info api
        Route::get('/about', 'index');
        // Update about Info api
        Route::put('/about/update/{id}', 'update');
    });

    // service api
    Route::controller(ServiceController::class)->group(function () {
        // get all services api
        Route::get('/services', 'index')->name('admin.services.all');
        // get single service api
        Route::get('/services/{id}', 'show');
        // store single service api
        Route::post('/services/store', 'store');
        // update single service api
        Route::put('/services/update/{id}', 'update');
        // delete single service api
        Route::delete('/services/delete/{id}', 'destroy');
    });
});
