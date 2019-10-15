<?php

namespace App\Analyzers;

class LinianAnalyzer implements AnalyzerInterface {

    public function validate(int $number) : int
    {
        return ($number % 3) + ($number % 5);
    }

    public function result() : string
    {
        return "Linianos";
    }

}