<?php

namespace App\Http\Controllers;
use App\Services\DaysBetweenDatesService;
use Illuminate\Http\Request;

class Days extends Controller
{
    public function calcDays(Request $request, DaysBetweenDatesService $daysBetweenDates)
    {
         $endDate = $request->endDate;
        $startDate = $request->startDate;
        $request->validate(
            [
                'endDate' => 'date_format:Y-m-d',
                'startDate' =>'date_format:Y-m-d'
            ]
        );

        if($startDate == null || $endDate == null){
            $daysBetweenDates = 0;
        }else{
            $daysBetweenDates = $daysBetweenDates->calculateDaysBetweenDates($startDate, $endDate);
        }
        return view('days', [
            'days' => $daysBetweenDates,
        ]);

    }
}
