<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\TopController;

Route::get('/weather', [WeatherController::class, 'index']);

Route::get('/weather/{id}', [WeatherController::class, 'weather']);

Route::get('/top', [TopController::class, 'index']);

Route::get('/search', [WeatherController::class,'searchLocation']);

Route::get('weather/change/{id}', [TopController::class,'changeDisplayTop']);
