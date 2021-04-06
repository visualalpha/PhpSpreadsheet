<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\Statistical;

use PhpOffice\PhpSpreadsheet\Calculation\Statistical;
use PHPUnit\Framework\TestCase;

class LogEstTest extends TestCase
{
    /**
     * @dataProvider providerLOGEST
     *
     * @param mixed $expectedResult
     * @param mixed $xValues
     * @param mixed $yValues
     * @param mixed $const
     * @param mixed $stats
     */
    public function testLOGEST($expectedResult, $yValues, $xValues, $const, $stats): void
    {
        $result = Statistical::LOGEST($yValues, $xValues, $const, $stats);
        //var_dump($result);
        $elements = count($expectedResult);
        for ($element = 0; $element < $elements; ++$element) {
            self::assertEqualsWithDelta($expectedResult[$element], $result[$element], 1E-12);
        }
    }

    public function providerLOGEST()
    {
        return require 'tests/data/Calculation/Statistical/LOGEST.php';
    }
}
