<?php

namespace App\Analyzers;

class ItAnalyzer implements AnalyzerInterface {

    public function validate(int $number) : int
    {
        return $number % 5;
    }

    public function result() : string
    {
        return "IT";
    }

}