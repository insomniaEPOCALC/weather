<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\TopController;
use Gemini\Laravel\Facades\Gemini;

Route::get('/weather', [WeatherController::class, 'index']);

Route::get('/weather/{id}', [WeatherController::class, 'weather']);

Route::get('/top', [TopController::class, 'index']);

Route::get('/search', [WeatherController::class, 'searchLocation']);

Route::get('/searchName', [WeatherController::class, 'searchLocationByName']);

Route::get('weather/change/{id}', [TopController::class, 'changeDisplayTop']);

Route::get('/gemini-test', function () {
    $prompt = 'Laravelの良いところを3つ教えてください。';

    // Gemini Proモデルを使ってコンテンツを生成
    $result = Gemini::generativeModel('models/gemini-2.0-flash')->generateContent($prompt);

    return $result->text(); // 生成されたテキストを返す
});

Route::get('/500', function () {abort(500);});
Route::get('/404', function () {abort(404);});
