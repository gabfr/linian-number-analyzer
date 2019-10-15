<?php

namespace App\Analyzers;

interface AnalyzerInterface {

    public function validate(int $number) : bool;

    public function result() : string;

}
