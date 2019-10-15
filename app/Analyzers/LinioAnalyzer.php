<?php

namespace App\Analyzers;

class LinioAnalyzer implements AnalyzerInterface {
    
    public function validate(int $number) : bool
    {
        return ($number % 3) == 0;
    }

    public function result() : string
    {
        return "Linio";
    }

}
