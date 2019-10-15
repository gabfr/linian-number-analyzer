<?php

namespace App\Analyzers;

class LinioAnalyzer implements AnalyzerInterface {

    public function run(int $number) : ?string
    {
        if ( ($number % 3) == 0 ) {
            return "Linio";
        }

        return null;
    }

}
