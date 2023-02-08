<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        $request->validate(
            [
                'endDate' => 'date_format:Y-m-d',
                'startDate' => 'date_format:Y-m-d|after:1959-01-01'

            ]
        );

        $endDate = $request->endDate;
        $startDate = $request->startDate;

        if ($startDate == null || $endDate == null) {
            return view('home', [
                'averageMax' => "X",
                'averageMin' => "X",
                'max' => "X",
                'min' => "X",
                'startDate' => "X",
                'endDate' => "X",
            ]);
        }
        $url = url('api/weather');
        $response = Http::get($url, [
            'query' => [
                'startDate' => $startDate,
                'endDate' => $endDate
            ]
        ]);
        $weatherData = $response->json();
        return view('home', [
            'averageMax' => $weatherData['averageMax'],
            'averageMin' => $weatherData['averageMin'],
            'max' => $weatherData['max'],
            'min' => $weatherData['min'],
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);
    }
}
