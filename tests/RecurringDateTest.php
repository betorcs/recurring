<?php

use PHPUnit\Framework\TestCase;

final class RecurringDateTest extends TestCase {

    
    public function testShouldReturnNextChristimas() {
        // Given
        $date = "2016-12-25"; // christmas
        $rrule = "FREQ=YEARLY;BYMONTH=12;BYMONTHDAY=25";

        // When
        $next = RecurringDate::getNextOccurrence($rrule, $date);

        // Then
        $this->assertEquals('2017-12-25', $next);
    }

    public function testShouldReturnNextBetorcsBirthday() {
        // Given
        $date = "1983-08-08"; // betorcs birthday
        $rrule = "FREQ=YEARLY;BYMONTH=8;BYMONTHDAY=8";

        // When
        $next = RecurringDate::getNextOccurrence($rrule, $date);

        // Then
        $this->assertEquals('2017-08-08', $next);
    }

    public function testShouldReturnNextMothersDay() {
        // Given
        $date = "2017-05-14"; // mother's day
        $rrule = "FREQ=YEARLY;BYMONTH=5;BYDAY=2SU";

        // When
        $next = RecurringDate::getNextOccurrence($rrule, $date);

        // Then
        $this->assertEquals('2018-05-13', $next);
    }

    public function testShouldReturnNextArcaBirthdayParty() {
        // Given
        $date = "2017-01-27"; // arca birthday party
        $rrule = "FREQ=MONTHLY;BYDAY=-1FR";

        // When
        $next = RecurringDate::getNextOccurrence($rrule, $date);

        // Then
        $this->assertEquals('2017-06-30', $next);
    }

}