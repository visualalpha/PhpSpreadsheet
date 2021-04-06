<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\MathTrig;

use PhpOffice\PhpSpreadsheet\Calculation\Functions;

class SumX2PY2Test extends AllSetupTeardown
{
    /**
     * @dataProvider providerSUMX2PY2
     *
     * @param mixed $expectedResult
     */
    public function testSUMX2PY2($expectedResult, array $matrixData1, array $matrixData2): void
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
        $sheet->getCell('B1')->setValue("=SUMX2PY2($funcArg1, $funcArg2)");
        $result = $sheet->getCell('B1')->getCalculatedValue();
        self::assertEqualsWithDelta($expectedResult, $result, 1E-12);
    }

    public function providerSUMX2PY2()
    {
        return require 'tests/data/Calculation/MathTrig/SUMX2PY2.php';
    }
}
