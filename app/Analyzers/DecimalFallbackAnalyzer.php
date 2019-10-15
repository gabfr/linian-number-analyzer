<?php

namespace App\Analyzers;

/**
 * The fallback validator. This validate method will always return 0
 */
class DecimalFallbackAnalyzer implements AnalyzerInterface {

    private $number;

    /**
     * This validate method will always return 0
     * This is a fallback analyzer
     */
    public function validate(int $number) : int
    {
        $this->number = $number;
        return 0;
    }

    public function result() : string
    {
        return "{$this->number}";
    }

}
