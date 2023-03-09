<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Days extends Controller
{
    public function calcDays(Request $request)
    {
        $request->validate(
            [
                'endDate' => 'date_format:Y-m-d',
                'startDate' => 'date_format:Y-m-d'
            ]
        );

        $endDate = $request->endDate;
        $startDate = $request->startDate;

        $url = url('api/calculateDays');
        $response = Http::get($url, [
            'query' => [
                'startDate' => $startDate,
                'endDate' => $endDate
            ]
        ]);
        $daysBetweenDates = $response->json();
        return view('days', [
            'days' => $daysBetweenDates,
        ]);
    }
}
