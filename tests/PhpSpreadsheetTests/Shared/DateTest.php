<?php

namespace PhpOffice\PhpSpreadsheetTests\Shared;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
    public function testSetExcelCalendar(): void
    {
        $calendarValues = [
            Date::CALENDAR_MAC_1904,
            Date::CALENDAR_WINDOWS_1900,
        ];

        foreach ($calendarValues as $calendarValue) {
            $result = Date::setExcelCalendar($calendarValue);
            self::assertTrue($result);
        }
    }

    public function testSetExcelCalendarWithInvalidValue(): void
    {
        $unsupportedCalendar = '2012';
        $result = Date::setExcelCalendar($unsupportedCalendar);
        self::assertFalse($result);
    }

    /**
     * @dataProvider providerDateTimeExcelToTimestamp1900
     *
     * @param mixed $expectedResult
     */
    public function testDateTimeExcelToTimestamp1900($expectedResult, ...$args): void
    {
        Date::setExcelCalendar(Date::CALENDAR_WINDOWS_1900);

        $result = Date::excelToTimestamp(...$args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerDateTimeExcelToTimestamp1900()
    {
        return require 'tests/data/Shared/Date/ExcelToTimestamp1900.php';
    }

    /**
     * @dataProvider providerDateTimeTimestampToExcel1900
     *
     * @param mixed $expectedResult
     */
    public function testDateTimeTimestampToExcel1900($expectedResult, ...$args): void
    {
        Date::setExcelCalendar(Date::CALENDAR_WINDOWS_1900);

        $result = Date::timestampToExcel(...$args);
        self::assertEqualsWithDelta($expectedResult, $result, 1E-5);
    }

    public function providerDateTimeTimestampToExcel1900()
    {
        return require 'tests/data/Shared/Date/TimestampToExcel1900.php';
    }

    /**
     * @dataProvider providerDateTimeDateTimeToExcel
     *
     * @param mixed $expectedResult
     */
    public function testDateTimeDateTimeToExcel($expectedResult, ...$args): void
    {
        Date::setExcelCalendar(Date::CALENDAR_WINDOWS_1900);

        $result = Date::dateTimeToExcel(...$args);
        self::assertEqualsWithDelta($expectedResult, $result, 1E-5);
    }

    public function providerDateTimeDateTimeToExcel()
    {
        return require 'tests/data/Shared/Date/DateTimeToExcel.php';
    }

    /**
     * @dataProvider providerDateTimeFormattedPHPToExcel1900
     *
     * @param mixed $expectedResult
     */
    public function testDateTimeFormattedPHPToExcel1900($expectedResult, ...$args): void
    {
        Date::setExcelCalendar(Date::CALENDAR_WINDOWS_1900);

        $result = Date::formattedPHPToExcel(...$args);
        self::assertEqualsWithDelta($expectedResult, $result, 1E-5);
    }

    public function providerDateTimeFormattedPHPToExcel1900()
    {
        return require 'tests/data/Shared/Date/FormattedPHPToExcel1900.php';
    }

    /**
     * @dataProvider providerDateTimeExcelToTimestamp1904
     *
     * @param mixed $expectedResult
     */
    public function testDateTimeExcelToTimestamp1904($expectedResult, ...$args): void
    {
        Date::setExcelCalendar(Date::CALENDAR_MAC_1904);

        $result = Date::excelToTimestamp(...$args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerDateTimeExcelToTimestamp1904()
    {
        return require 'tests/data/Shared/Date/ExcelToTimestamp1904.php';
    }

    /**
     * @dataProvider providerDateTimeTimestampToExcel1904
     *
     * @param mixed $expectedResult
     */
    public function testDateTimeTimestampToExcel1904($expectedResult, ...$args): void
    {
        Date::setExcelCalendar(Date::CALENDAR_MAC_1904);

        $result = Date::timestampToExcel(...$args);
        self::assertEqualsWithDelta($expectedResult, $result, 1E-5);
    }

    public function providerDateTimeTimestampToExcel1904()
    {
        return require 'tests/data/Shared/Date/TimestampToExcel1904.php';
    }

    /**
     * @dataProvider providerIsDateTimeFormatCode
     *
     * @param mixed $expectedResult
     */
    public function testIsDateTimeFormatCode($expectedResult, ...$args): void
    {
        $result = Date::isDateTimeFormatCode(...$args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerIsDateTimeFormatCode()
    {
        return require 'tests/data/Shared/Date/FormatCodes.php';
    }

    /**
     * @dataProvider providerDateTimeExcelToTimestamp1900Timezone
     *
     * @param mixed $expectedResult
     */
    public function testDateTimeExcelToTimestamp1900Timezone($expectedResult, ...$args): void
    {
        Date::setExcelCalendar(Date::CALENDAR_WINDOWS_1900);

        $result = Date::excelToTimestamp(...$args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerDateTimeExcelToTimestamp1900Timezone()
    {
        return require 'tests/data/Shared/Date/ExcelToTimestamp1900Timezone.php';
    }
}
