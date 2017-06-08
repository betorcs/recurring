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
    
    public static function getNextOccurrence($rrule = null) {
        $r = new When();

        $r = $r->rrule($rrule);

        $date = new DateTime();

        while (true) {

            if ($r->occursOn($date))
                return $date->format('Y-m-d');

            $date->add(new DateInterval("P1D"));
        }
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
        $rrule = "FREQ=YEARLY;BYMONTH=12;BYMONTHDAY=25";

        // When
        $next = RecurringDate::getNextOccurrence($rrule);

        // Then
        $this->assertEquals('2017-12-25', $next);
    }

    public function testShouldReturnNextBetorcsBirthday() {
        // Given
        $rrule = "FREQ=YEARLY;BYMONTH=8;BYMONTHDAY=8";

        // When
        $next = RecurringDate::getNextOccurrence($rrule);

        // Then
        $this->assertEquals('2017-08-08', $next);
    }

    public function testShouldReturnNextMothersDay() {
        // Given
        $rrule = "FREQ=YEARLY;BYMONTH=5;BYDAY=2SU";

        // When
        $next = RecurringDate::getNextOccurrence($rrule);

        // Then
        $this->assertEquals('2018-05-13', $next);
    }

    public function testShouldReturnNextArcaBirthdayParty() {
        // Given
        $rrule = "FREQ=MONTHLY;BYDAY=-1FR";

        // When
        $next = RecurringDate::getNextOccurrence($rrule);

        // Then
        $this->assertEquals('2017-06-30', $next);
    }

}
```
