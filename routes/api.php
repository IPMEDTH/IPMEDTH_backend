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

Route::apiResource('materials', MaterialController::class);
Route::get('getmaterials/{term}', [MaterialController::class, 'search']);
Route::post('postmaterial', [MaterialController::class, 'store']);

Route::apiResource('locations', LocationController::class);

Route::apiResource('reservations', ReservationController::class);

Route::apiResource('helpers', HelperController::class);
Route::get('helpers/location/{location}', [HelperController::class, 'location']);
