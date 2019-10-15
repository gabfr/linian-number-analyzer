<?php

namespace App\Analyzers;

class LinianAnalyzer implements AnalyzerInterface {

    public function validate(int $number) : bool
    {
        return ($number % 3) == 0 && ($number % 5) == 0;
    }

    public function result() : string
    {
        return "Linianos";
    }

}