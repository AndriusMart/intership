<?php

namespace Tests\Unit;
use App\Services\NumbersToWordsService;
use Tests\TestCase;
use Illuminate\Http\Request;

class WordsTest extends TestCase
{
   
    public function testNumberToWords()
    {
        $service = new NumbersToWordsService();

        $request = new Request();
        $request['query'] = [
            'number' => 23456
        ];

        $expected = 'dvidešimt trys tūkstančiai keturi šimtai penkiasdešimt šeši';
        $result = $service->numberToWords($request);
        $this->assertEquals($expected, $result);


        $request = new Request();
        $request['query'] = [
            'number' => 56
        ];

        $expected = 'penkiasdešimt šeši';
        $result = $service->numberToWords($request);
        $this->assertEquals($expected, $result);



        $request = new Request();
        $request['query'] = [
            'number' => 2000000
        ];

        $expected = 'du milijonai';
        $result = $service->numberToWords($request);
        $this->assertEquals($expected, $result);
    }
}
