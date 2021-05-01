<?php

use App\Http\Controllers\API\FoodController;
use App\Http\Controllers\API\MidtransController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\UsersController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UsersController::class, 'fetch']);
    Route::post('user', [UsersController::class, 'updateProfile']);
    Route::post('user/photo', [UsersController::class, 'updatePhoto']);
    Route::post('logout', [UsersController::class, 'logout']);

    Route::post('checkout', [TransactionController::class, 'checkout']);

    Route::get('transaction', [TransactionController::class, 'all']);
    Route::post('transaction/{id}', [TransactionController::class, 'update']);
});

Route::post('login', [UsersController::class, 'login']);
Route::post('register', [UsersController::class, 'register']);


Route::get('food', [FoodController::class, 'all']);

Route::post('midtrans/callback', [MidtransController::class, 'callback']);
