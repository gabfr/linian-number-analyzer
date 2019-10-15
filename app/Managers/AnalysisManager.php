<?php

namespace App\Managers;

use App\Analyzers\DecimalFallbackAnalyzer;
use App\Analyzers\ItAnalyzer;
use App\Analyzers\LinianAnalyzer;
use App\Analyzers\LinioAnalyzer;
use Generator;

class AnalysisManager {

    const ANALYZERS_STACK = [
        LinianAnalyzer::class,
        ItAnalyzer::class,
        LinioAnalyzer::class,
        DecimalFallbackAnalyzer::class,
    ];

    /**
     * @var AnalyzerInterface[]
     */
    private $analyzers;

    public function __construct()
    {
        $this->analyzers = array_map(function($class) { return new $class(); }, static::ANALYZERS_STACK);
    }

    /**
     * Run the analyzers in a determinated numbers range
     * @param int $from The starting point
     * @param int $to The ending point
     */
    public function runWithRange(int $from = 1, int $to = 100) : Generator
    {
        if ($from > $to) {
            throw new \Exception('The specified range is not reachable (from > to)');
        }

        $analysisResult = null;
        for ($i = $from; $i <= $to; $i++) {
            foreach ($this->analyzers as $analyzer) {
                if ($analyzer->validate($i)) {
                    yield $i => $analyzer->result();
                    break;
                }
            }
        }
    }

}
