<?php

namespace Tests\Unit;
use App\Services\DaysBetweenDatesService;
use Tests\TestCase;
use Illuminate\Http\Request;
class TaskTest extends TestCase
{
   
    public function testCalculateDaysBetweenDates()
    {
        $service = new DaysBetweenDatesService();

        // Test start date: 2022-08-01, end date: 2023-12-04
        $request = new Request();
        $request['query'] = [
            'startDate' => '2022-08-01',
            'endDate' => '2023-12-04',
        ];

        $result = $service->calculateDaysBetweenDates($request);
        $expected = json_encode(490);

        $this->assertEquals($expected, $result);

        // Test start date: 2022-08-01, end date: 2022-12-31
        $request = new Request();
        $request['query'] = [
            'startDate' => '2022-08-01',
            'endDate' => '2022-12-31',
        ];

        $result = $service->calculateDaysBetweenDates($request);
        $expected = json_encode(152);

        $this->assertEquals($expected, $result);

        // Test start date: 2022-08-01, end date: 2022-08-01
        $request = new Request();
        $request['query'] = [
            'startDate' => '2022-08-01',
            'endDate' => '2022-08-01',
        ];

        $result = $service->calculateDaysBetweenDates($request);
        $expected = json_encode(0);

        $this->assertEquals($expected, $result);
    }
}
