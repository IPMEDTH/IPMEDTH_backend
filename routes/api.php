<?php

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

Route::middleware('auth:sanctum')->get('user', [UserController::class, 'showCurrentUser']);
Route::middleware('auth:sanctum')->put('user', [UserController::class, 'updateCurrentUser']);

Route::middleware('auth:sanctum')->post('/tokens', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

Route::middleware('auth:sanctum')->delete('/tokens/{tokenId}', function (Request $request, $tokenId) {
    return response()->json(
        $request->user()->tokens()->where('id', $tokenId)->delete()
    );
});

Route::apiResource('users', UserController::class);
Route::get('helpers', [UserController::class, 'indexHelpers']);

Route::apiResource('materials', MaterialController::class);
Route::get('materials/search/{term}', [MaterialController::class, 'search']);
Route::put('materials', [MaterialController::class, 'update']);

Route::apiResource('locations', LocationController::class);

Route::apiResource('reservations', ReservationController::class);
Route::get('reservations/user/{term}', [ReservationController::class, 'search']);
Route::get('reservations/{locationTerm}/{dateTerm}', [ReservationController::class, 'getReservationOnDate']);
