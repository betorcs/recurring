<?php

use PHPUnit\Framework\TestCase;

final class RecurringDateTest extends TestCase {

    
    public function testShouldReturnNextChristimas() {
        // Given
        $date = "2016-12-25"; // christmas
        $rrule = "FREQ=YEARLY;BYMONTH=12;BYMONTHDAY=25";

        // When
        $next = RecurringDate::getNextOccurence($date, $rrule);

        // Then
        $this->assertEquals('2017-12-25', $next);
    }

    public function testShouldReturnNextBetorcsBirthday() {
        // Given
        $date = "1983-08-08"; // christmas
        $rrule = "FREQ=YEARLY;BYMONTH=8;BYMONTHDAY=8";

        // When
        $next = RecurringDate::getNextOccurence($date, $rrule);

        // Then
        $this->assertEquals('2017-08-08', $next);
    }

}