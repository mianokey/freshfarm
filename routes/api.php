<?php

use App\Http\Controllers\ApiAnimalController;
use App\Http\Controllers\ApiUserController;
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


Route::get('animals',[ApiAnimalController::class, 'index']);
Route::patch('animals/update/{id}',[ApiAnimalController::class, 'update']);
Route::middleware('auth:sanctum')->post('/animals/create', [ApiAnimalController::class, 'create']);

Route::delete('animals/delete/{id}',[ApiAnimalController::class, 'delete']);
Route::get('animals/show/{id}',[ApiAnimalController::class, 'show']);



Route::post('login',[ApiUserController::class, 'login']);
Route::post('register',[ApiUserController::class, 'register']);