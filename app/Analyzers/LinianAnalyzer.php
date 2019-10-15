<?php

namespace App\Analyzers;

class LinianAnalyzer implements AnalyzerInterface {

    public function run(int $number) : ?string
    {
        if ( ($number % 3) == 0 && ($number % 5) == 0 ) {
            return "Linianos";
        }

        return null;
    }

}