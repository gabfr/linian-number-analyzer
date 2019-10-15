<?php

namespace App\Analyzers;

class ItAnalyzer implements AnalyzerInterface {

    public function validate(int $number) : bool
    {
        return ($number % 5) == 0;
    }

    public function result() : string
    {
        return "IT";
    }

}