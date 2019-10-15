<?php

namespace App\Analyzers;

class DecimalFallbackAnalyzer implements AnalyzerInterface {

    public function run(int $number) : ?string
    {
        return "{$number}";
    }

}
