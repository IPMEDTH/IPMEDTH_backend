<?php

use App\Http\Controllers\HelperController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('users', UserController::class);
Route::get('helpers', [UserController::class, 'indexHelpers']);

Route::apiResource('materials', MaterialController::class);
Route::get('materials/search/{term}', [MaterialController::class, 'search']);

Route::apiResource('locations', LocationController::class);

Route::apiResource('reservations', ReservationController::class);
Route::get('reservations/user/{term}', [ReservationController::class, 'search']);
Route::get('reservations/{locationTerm}/{dateTerm}', [ReservationController::class, 'getReservationOnDate']);
