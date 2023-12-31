<?php

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

Route::middleware(['auth:sanctum'])
    ->prefix('auth')
    ->group(function () {
        Route::controller(\App\Http\Controllers\Api\AuthController::class)
            ->group(function () {
                Route::post('register', 'register')
                    ->withoutMiddleware('auth:sanctum');
                Route::post('login', 'login')
                    ->withoutMiddleware('auth:sanctum');
                Route::get('me', 'me');
                Route::post('logout', 'logout');
            });
    });

Route::middleware(['auth:sanctum'])
    ->group(function () {
        Route::controller(\App\Http\Controllers\Api\RequestController::class)
            ->group(function () {
                Route::post('requests', 'create')
                    ->withoutMiddleware('auth:sanctum');
                Route::put('requests/{id}', 'update');
                Route::get('requests', 'index');
            });
    });

Route::middleware(['auth:sanctum'])
    ->group(function () {
        Route::controller(\App\Http\Controllers\Api\EmailMessageController::class)
            ->group(function () {
                Route::post('emails/send', 'send');
                Route::get('emails', 'index');
            });
    });


