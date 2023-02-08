<?php

namespace App\Http\Controllers;
use App\Services\NumbersToWordsService;
use Illuminate\Http\Request;

class Words extends Controller
{
    public function numToWord(Request $request, NumbersToWordsService $numbersToWords)
    {
        $number = $request->number;
        $request->validate(
            [
                'number' => 'numeric|max_digits:9|min:0',
            ]);
        if($number == null){
            $numbersToWords = 0;
        }else{
            $numbersToWords = $numbersToWords->numberTowords($number);
        }
        return view('words', [
            'words' => $numbersToWords,
        ]);
    }
}
