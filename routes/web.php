<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\TopController;

Route::get('/weather', [WeatherController::class, 'index']);

Route::get('/weather/{id}', [WeatherController::class, 'weather']);

Route::get('/top', [TopController::class, 'index']);

Route::get('/search', [WeatherController::class,'searchLocation']);

Route::get('/wether/{id}', [TopController::class,'check']);
