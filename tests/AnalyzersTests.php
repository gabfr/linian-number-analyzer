<?php

require __DIR__ .'/../bootstrap.php';

use App\Analyzers\ItAnalyzer;
use App\Analyzers\LinianAnalyzer;
use App\Analyzers\LinioAnalyzer;
use App\Managers\AnalysisManager;
use PHPUnit\Framework\TestCase;

class AnalyzersTests extends TestCase {

    public function testLinianAnalyzer()
    {
        $analyzer = new LinianAnalyzer();
        $this->assertTrue(
            $analyzer->validate(15),
            'Failed asserting that 15 analyzed by LinianAnalyzer should return true'
        );
        $this->assertEquals(
            "Linianos", 
            $analyzer->result(), 
            'Failed asserting that the result method of LinianAnalyzer should return "Linianos"'
        );
    }

    public function testLinianAnalyzerWithWrongNumber()
    {
        $analyzer = new LinianAnalyzer();
        $this->assertFalse(
            $analyzer->validate(1),
            'Failed asserting that 15 analyzed by LinianAnalyzer should return false'
        );
    }

    public function testItAnalyzer()
    {
        $analyzer = new ItAnalyzer();
        $this->assertTrue(
            $analyzer->validate(15),
            'Failed asserting that 15 analyzed by ItAnalyzer should return true'
        );
        $this->assertEquals(
            "IT", 
            $analyzer->result(), 
            'Failed asserting that the result method of ItAnalyzer should return "IT"'
        );
    }

    public function testItAnalyzerWithWrongNumber()
    {
        $analyzer = new ItAnalyzer();
        $this->assertFalse(
            $analyzer->validate(12),
            'Failed asserting that 15 analyzed by ItAnalyzer should return false'
        );
    }

    public function testLinioAnalyzer()
    {
        $analyzer = new LinioAnalyzer();
        $this->assertTrue(
            $analyzer->validate(15),
            'Failed asserting that 15 analyzed by LinioAnalyzer should return true'
        );
        $this->assertEquals(
            "Linio", 
            $analyzer->result(), 
            'Failed asserting that the result method of LinioAnalyzer should return "Linio"'
        );
    }

    public function testLinioAnalyzerWithWrongNumber()
    {
        $analyzer = new LinioAnalyzer();
        $this->assertFalse(
            $analyzer->validate(7),
            'Failed asserting that 7 analyzed by LinioAnalyzer should return false'
        );
    }

    public function testAnalysisManagerRangeRunnerFromOneToTwentyWithManualAsserts()
    {
        $analysisManager = new AnalysisManager();
        $analyzed = iterator_to_array($analysisManager->runWithRange(1, 20));
        
        // [1] => 1
        $this->assertEquals("1", $analyzed[1]);
        // [2] => 2
        $this->assertEquals("2", $analyzed[2]);
        // [3] => Linio
        $this->assertEquals("Linio", $analyzed[3]);
        // [4] => 4
        $this->assertEquals("4", $analyzed[4]);
        // [5] => IT
        $this->assertEquals("IT", $analyzed[5]);
        // [6] => Linio
        $this->assertEquals("Linio", $analyzed[6]);
        // [7] => 7
        $this->assertEquals("7", $analyzed[7]);
        // [8] => 8
        $this->assertEquals("8", $analyzed[8]);
        // [9] => Linio
        $this->assertEquals("Linio", $analyzed[9]);
        // [10] => IT
        $this->assertEquals("IT", $analyzed[10]);
        // [11] => 11
        $this->assertEquals("11", $analyzed[11]);
        // [12] => Linio
        $this->assertEquals("Linio", $analyzed[12]);
        // [13] => 13
        $this->assertEquals("13", $analyzed[13]);
        // [14] => 14
        $this->assertEquals("14", $analyzed[14]);
        // [15] => Linianos
        $this->assertEquals("Linianos", $analyzed[15]);
        // [16] => 16
        $this->assertEquals("16", $analyzed[16]);
        // [17] => 17
        $this->assertEquals("17", $analyzed[17]);
        // [18] => Linio
        $this->assertEquals("Linio", $analyzed[18]);
        // [19] => 19
        $this->assertEquals("19", $analyzed[19]);
        // [20] => IT
        $this->assertEquals("IT", $analyzed[20]);
    }

    public function testAnalysisManagerRangeRunnerFromOneToHundredWithAutoAssert()
    {
        $analysisManager = new AnalysisManager();
        
        foreach ($analysisManager->runWithRange(1, 100) as $number => $analysisResult) {
            if ( ($number % 3 == 0) && ($number % 5 == 0) ) {
                $this->assertEquals(
                    "Linianos", 
                    $analysisResult, 
                    "Failed asserting that the analysis result of the number {$number} is Linianos"
                );
            } else if ( $number % 5 == 0 ) {
                $this->assertEquals(
                    "IT",
                    $analysisResult,
                    "Failed asserting that the analysis result of the number {$number} is IT"
                );
            } else if ( $number % 3 == 0 ) {
                $this->assertEquals(
                    "Linio",
                    $analysisResult,
                    "Failed asserting that the analysis result of the number {$number} is Linio"
                );
            } else {
                $this->assertEquals(
                    "{$number}",
                    $analysisResult,
                    "Failed asserting that the analysis result of the number {$number} is the number itself"
                );
            }
        }
    }
}
