<?php

namespace App\Analyzers;

class LinioAnalyzer implements AnalyzerInterface {
    
    public function validate(int $number) : int
    {
        return $number % 3;
    }

    public function result() : string
    {
        return "Linio";
    }

}
