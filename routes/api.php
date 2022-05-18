<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BookShelf\BookShelfController;
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
    Route::delete('/logout', [LogoutController::class, 'destroy']);

    Route::get('/book', [BookShelfController::class, 'index']);
    Route::get('/book/{id}', [BookShelfController::class, 'show']);
    Route::post('/book', [BookShelfController::class, 'store']);
    Route::put('/book/{id}/update', [BookShelfController::class, 'update']);
    Route::delete('/book/{id}', [BookShelfController::class, 'destroy']);
});

Route::post('/login', [LoginController::class, 'store']);
