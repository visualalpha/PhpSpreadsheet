<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\MathTrig;

use PhpOffice\PhpSpreadsheet\Calculation\Functions;

class SumXMY2Test extends AllSetupTeardown
{
    /**
     * @dataProvider providerSUMXMY2
     *
     * @param mixed $expectedResult
     */
    public function testSUMXMY2($expectedResult, array $matrixData1, array $matrixData2): void
    {
        $this->mightHaveException($expectedResult);
        $sheet = $this->sheet;
        $maxRow = 0;
        $funcArg1 = '';
        foreach (Functions::flattenArray($matrixData1) as $arg) {
            ++$maxRow;
            $funcArg1 = "A1:A$maxRow";
            $this->setCell("A$maxRow", $arg);
        }
        $maxRow = 0;
        $funcArg2 = '';
        foreach (Functions::flattenArray($matrixData2) as $arg) {
            ++$maxRow;
            $funcArg2 = "C1:C$maxRow";
            $this->setCell("C$maxRow", $arg);
        }
        $sheet->getCell('B1')->setValue("=SUMXMY2($funcArg1, $funcArg2)");
        $result = $sheet->getCell('B1')->getCalculatedValue();
        self::assertEqualsWithDelta($expectedResult, $result, 1E-12);
    }

    public function providerSUMXMY2(): array
    {
        return require 'tests/data/Calculation/MathTrig/SUMXMY2.php';
    }
}
