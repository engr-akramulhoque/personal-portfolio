<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\ProfileController;
use App\Http\Controllers\Api\Frontend\HomeController;
use App\Http\Controllers\Api\Main\AboutController;
use Illuminate\Support\Facades\Route;


/* Frontend apis */
// login api
Route::post('/login', LoginController::class);

// landing page api
Route::get('/home', HomeController::class);



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
});
