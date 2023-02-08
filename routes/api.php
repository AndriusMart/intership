<?php
use App\Services\NumbersToWordsService;
use App\Services\DaysBetweenDatesService;
use App\Services\WeatherService;
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
// Route::get('calculateDays', 'DaysBetweenDatesService@calculate');
Route::get('/calculateDays', [DaysBetweenDatesService::class, 'calculateDaysBetweenDates']);
Route::get('/numToWords', [NumbersToWordsService::class, 'numberTowords']);
Route::get('/weather', [WeatherService::class, 'getWeatherData']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    
    return $request->user();
});
