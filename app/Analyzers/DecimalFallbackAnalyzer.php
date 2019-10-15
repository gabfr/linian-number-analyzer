<?php

namespace App\Analyzers;

/**
 * The fallback validator. This validate method will always return true
 */
class DecimalFallbackAnalyzer implements AnalyzerInterface {

    private $number;

    /**
     * This validate method will always return true
     * This is a fallback analyzer
     */
    public function validate(int $number) : bool
    {
        $this->number = $number;
        return true;
    }

    public function result() : string
    {
        return "{$this->number}";
    }

}
