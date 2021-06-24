<?php

use App\Http\Resources\RoomResource;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;

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

/* Room */
Route::get('rooms', [RoomController::class, 'index']);
Route::get('rooms/{room}', [RoomController::class, 'show']);
Route::post('rooms', [RoomController::class, 'store']);
Route::put('rooms/{room}', [RoomController::class, 'update']);
Route::delete('rooms/{room}', [RoomController::class, 'delete']);

/* Booking */
Route::get('bookings', [BookingController::class, 'index']);
Route::get('bookings/{booking}', [BookingController::class, 'show']);
Route::post('bookings', [BookingController::class, 'store']);
Route::put('bookings/{booking}', [BookingController::class, 'update']);
Route::delete('bookings/{booking}', [BookingController::class, 'delete']);

