# About

It's a sample project to show how to use recurring dates in PHP.

# How to

```bash
$ phpunit --bootstrap src/Recurringdate.php tests/RecurringDateTest.php
```

# Classes

**src/RecurringDate.php**

```php
<?php
require 'vendor/autoload.php';

use When\When;

final class RecurringDate {
    
    public static function getNextOccurence($date = null, $rrule = null) {
        $r = new When();
        $r->startDate(new DateTime($date))
            ->rrule($rrule)
            ->generateOccurrences();

        $today = new DateTime();

        foreach ($r->occurrences as $occur) {
            if ($occur >= $today) {
                return $occur->format('Y-m-d');
            }
        }

        throw new OccurrenceNotFoundException();
    }

}
```

**tests/RecurringDateTest.php**

```php
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
        $date = "1983-08-08"; // betorcs birthday
        $rrule = "FREQ=YEARLY;BYMONTH=8;BYMONTHDAY=8";

        // When
        $next = RecurringDate::getNextOccurence($date, $rrule);

        // Then
        $this->assertEquals('2017-08-08', $next);
    }

    public function testShouldReturnNextMothersDay() {
        // Given
        $date = "2017-05-14"; // mother's day
        $rrule = "FREQ=YEARLY;BYMONTH=5;BYDAY=2SU";

        // When
        $next = RecurringDate::getNextOccurence($date, $rrule);

        // Then
        $this->assertEquals('2018-05-13', $next);
    }

    public function testShouldReturnNextArcaBirthdayParty() {
        // Given
        $date = "2017-01-27"; // arca birthday party
        $rrule = "FREQ=MONTHLY;BYDAY=-1FR";

        // When
        $next = RecurringDate::getNextOccurence($date, $rrule);

        // Then
        $this->assertEquals('2017-06-30', $next);
    }

}
```
