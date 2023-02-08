<?php

namespace App\Services;
use Illuminate\Http\Request;


class DaysBetweenDatesService
{
    public function calculateDaysBetweenDates(Request $request)
    {
        // works only with date format YYYY-MM-DD
        $startDate = $request['query']['startDate'];
        $endDate = $request['query']['endDate'];
        $startDate = explode("-", $startDate); //"2022-08-01";
        $endDate = explode("-", $endDate); // "2023-12-04";

        //  separating years, months and days
        if(count($startDate)!= 3 || count($endDate) != 3){
            return "Bad date format";
        }
        $startYear = $startDate[0];
        $endYear = $endDate[0];

        $startMonth = $startDate[1];
        $endMonth = $endDate[1];

        $startDay = $startDate[2];
        $endDay = $endDate[2];
        // each months days count
        $daysInMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        // checking if in that time has been a leap year
        $leapYears = 0;

        for ($i = $startYear; $i < $endYear; $i++) {
            if (($i % 4 == 0 && $i % 100 != 0) || $i % 400 == 0) {
                $leapYears++;
            }
        }
        // countng years passed and making it to days + adding a leap years days
        $elapsedDays = ($endYear - $startYear) * 365 + $leapYears;
        // countng days of moths till set month (start) and subtracting days from total 
        for ($i = 0; $i < $startMonth - 1; $i++) {
            $elapsedDays -= $daysInMonth[$i];
        }

        // countng days of moths till set month (end) and adding days to total 
        for ($i = 0; $i < $endMonth - 1; $i++) {
            $elapsedDays += $daysInMonth[$i];
        }

        // countng days between dates and adding them to total 
        $elapsedDays += ($endDay - $startDay);

        return json_encode($elapsedDays);
    }
}
