<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UserController;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(UserController::class)->group(function () {
    
    Route::get('/users', 'list');
    Route::get('/users/{userId}/activities/{activityId}', 'user_activity');

    // https://laravel.com/docs/10.x/routing#implicit-binding
    Route::get('/users/{user}', function (User $user) {
        return $user;
    });

});

Route::controller(ActivityController::class)->group(function () {
    
    Route::get('/activities', 'list');
    
    // https://laravel.com/docs/10.x/routing#implicit-binding
    Route::get('/activities/{activity}', function (Activity $activity) {
        return $activity;
    });

});