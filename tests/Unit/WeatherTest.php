<?php

namespace Tests\Unit;

use App\Services\WeatherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class WeatherTest extends TestCase
{
    public function testTempToWords()
    {
        $weatherController = new WeatherService();

        $result = $weatherController->tempToWords(0);
        $this->assertEquals('nulis °C', $result);

        $result = $weatherController->tempToWords(5.5);
        $this->assertEquals('plius penki kablelis penki °C', $result);

        $result = $weatherController->tempToWords(-5.5);
        $this->assertEquals('minus penki kablelis penki °C', $result);
    }

    public function testGetWeatherData()
    {
        $weatherController = new WeatherService();
        $request = new Request();
        $request['query'] = [
            'startDate' => '2022-08-01',
            'endDate' => '2022-12-04',
        ];
        $result = json_decode($weatherController->getWeatherData($request), true);
        // result has keys
        $this->assertArrayHasKey('averageMax', $result);
        $this->assertArrayHasKey('averageMin', $result);
        $this->assertArrayHasKey('max', $result);
        $this->assertArrayHasKey('min', $result);
        // result is string
        $this->assertIsString($result['averageMax']);
        $this->assertIsString($result['averageMin']);
        $this->assertIsString($result['max']);
        $this->assertIsString($result['min']);

        // result is as expected
        $expected = [
        "averageMax" => "plius trylika kablelis penki °C",
        "averageMin" => "plius septyni kablelis šeši °C",
        "max" => "plius trisdešimt  kablelis trys °C",
        "min" => "minus aštuoni kablelis vienas °C"
        ];
        $this->assertEquals($expected, $result);



        $request = new Request();
        $request['query'] = [
            'startDate' => '1968-08-01',
            'endDate' => '2000-12-04',
        ];
        $result = json_decode($weatherController->getWeatherData($request), true);
        // result is as expected
        $expected = [
            "averageMax" => "plius devyni kablelis septyni °C",
            "averageMin" => "plius trys kablelis keturi °C",
            "max" => "plius trisdešimt trys °C",
            "min" => "minus trisdešimt  kablelis šeši °C",
            ];
            $this->assertEquals($expected, $result);

    }
}
