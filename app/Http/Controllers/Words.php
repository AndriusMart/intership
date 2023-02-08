<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class Words extends Controller
{
    public function numToWord(Request $request)
    {
        $request->validate(
            [
                'number' => 'numeric|max_digits:9|min:0',
            ]);
            $number = $request->number;
            $url = url('api/numToWords');
            $response = Http::get($url, [
                'query' => [
                    'number' => $number ,
                ]
            ]); 
            $numbersToWords = $response->json();
        return view('words', [
            'words' => $numbersToWords,
        ]);
    }
}
