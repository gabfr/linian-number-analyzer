<?php

namespace App\Analyzers;

interface AnalyzerInterface {

    /**
     * This method should take care of analyzing and returning the result of the analysis
     * The result of the analysis is an string (when there is a result)
     * When it is null, means that the analysis wrecked on a wall
     */
    public function run(int $number) : ?string;

}
