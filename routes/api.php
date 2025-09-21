<?php

use App\Http\Controllers\LogController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::apiResource('tasks', TaskController::class);
Route::get('/logs', [LogController::class, 'index']);
