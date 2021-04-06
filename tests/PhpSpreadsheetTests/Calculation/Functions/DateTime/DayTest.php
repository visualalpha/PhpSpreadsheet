<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\DateTime;

use PhpOffice\PhpSpreadsheet\Calculation\DateTime;
use PhpOffice\PhpSpreadsheet\Calculation\Functions;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PHPUnit\Framework\TestCase;

class DayTest extends TestCase
{
    protected function setUp(): void
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
        Functions::setReturnDateType(Functions::RETURNDATE_EXCEL);
        Date::setExcelCalendar(Date::CALENDAR_WINDOWS_1900);
    }

    /**
     * @dataProvider providerDAY
     *
     * @param mixed $expectedResultExcel
     * @param mixed $expectedResultOpenOffice
     * @param $dateTimeValue
     */
    public function testDAY($expectedResultExcel, $expectedResultOpenOffice, $dateTimeValue): void
    {
        $resultExcel = DateTime::DAYOFMONTH($dateTimeValue);
        self::assertEqualsWithDelta($expectedResultExcel, $resultExcel, 1E-8);

        Functions::setCompatibilityMode(Functions::COMPATIBILITY_OPENOFFICE);

        $resultOpenOffice = DateTime::DAYOFMONTH($dateTimeValue);
        self::assertEqualsWithDelta($expectedResultOpenOffice, $resultOpenOffice, 1E-8);
    }

    public function providerDAY()
    {
        return require 'tests/data/Calculation/DateTime/DAY.php';
    }
}
