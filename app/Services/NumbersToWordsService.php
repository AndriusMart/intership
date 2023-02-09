<?php

namespace App\Services;
use Illuminate\Http\Request;

class NumbersToWordsService{

    function numberTowords(Request $request){

        $number = $request['query']['number'];
        if ($number == 0) return 'nulis';

        $ones = array('', 'vienas', 'du', 'trys', 'keturi', 'penki', 'šeši', 'septyni', 'aštuoni', 'devyni');

        $teens = array('', 'vienuolika', 'dvylika', 'trylika', 'keturiolika', 'penkiolika', 'šešiolika', 'septyniolika', 'aštuoniolika', 'devyniolika');

        $tens = array('', 'dešimt', 'dvidešimt', 'trisdešimt', 'keturiasdešimt', 'penkiasdešimt', 'šešiasdešimt', 'septyniasdešimt', 'aštuoniasdešimt', 'devyniasdešimt');

        $hundreds = array(
            array('milijonas', 'milijonai', 'milijonų'),
            array('tūkstantis', 'tūkstančiai', 'tūkstančių'),
        );

        $number = sprintf('%09d', $number); // to bilion
        $number = str_split($number, 3); // separate in to pairs of 3 
        $words = array();

        foreach ($number as $i => $triplet) {
            $plural  = 0;
            // add hundred if triplets first number > 0
            if ($triplet[0] > 0) {
                $words[] = $ones[$triplet[0]];
                $words[] = ($triplet[0] > 1) ? 'šimtai' : 'šimtas';
            }
            // checking last two numbers of triplets
            $two = substr($triplet, 1);
            // dump($two);
            // checking teen's numbers
            if ($two > 10 && $two < 20) {
                $words[] = $teens[$two[1]];
                $plural  = 2;
            } else {

                // checking tens
                if ($two[0] > 0) {
                    $words[] = $tens[$two[0]];
                }

                // checking ones
                if ($two[1] > 0) {
                    $words[] = $ones[$two[1]];
                    $plural  = ($two[1] > 1) ? 1 : 0;
                } else {
                    $plural  = 2;
                }
            }
            // adding name to all except last and zeros trplets
            if ($i < count($hundreds) && $triplet != '000') {
                $words[] = $hundreds[$i][$plural];
            }
        }
        return  implode(' ', $words,);
    }


}