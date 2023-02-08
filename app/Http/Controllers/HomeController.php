<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(Request $request, WeatherService $weatherData)
    {
        $endDate = $request->endDate;
        $startDate = $request->startDate;
        $request->validate(
            [
                'endDate' => 'date_format:Y-m-d',
                'startDate' => 'date_format:Y-m-d|after:1959-01-01'
                
            ]
        );

        if ($startDate == null || $endDate == null) {
            return view('home', [
                'averageMax' => "X",
                'averageMin' => "X",
                'max' => "X",
                'min' => "X",
                'startDate' => "X",
            'endDate' =>"X",
            ]);
        }
        $weatherData = $weatherData->getWeatherData($startDate, $endDate);
        return view('home', [
            'averageMax' => $weatherData['averageMax'],
            'averageMin' => $weatherData['averageMin'],
            'max' => $weatherData['max'],
            'min' => $weatherData['min'],
            'startDate' =>$startDate,
            'endDate' =>$endDate,
        ]);
    }
}
