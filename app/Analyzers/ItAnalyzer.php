<?php

namespace App\Analyzers;

class ItAnalyzer implements AnalyzerInterface {

    public function run(int $number) : ?string
    {
        if ( ($number % 5) == 0 ) {
            return "IT";
        }

        return null;
    }

}