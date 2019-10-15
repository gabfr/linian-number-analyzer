<?php

namespace App\Analyzers;

interface AnalyzerInterface {

    /**
     * The validation will execute the propers validations and shall return 0 in case the validation pass
     * Otherwise it will return another number
     */
    public function validate(int $number) : int;

    public function result() : string;

}
