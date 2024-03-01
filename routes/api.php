<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::post('/users', [UserController::class, 'create']);
Route::post('/login', [UserController::class, 'login']);
Route::middleware('api')->put('/users', [UserController::class, 'update']);
Route::middleware('api')->get('/user', [UserController::class, 'get']);
