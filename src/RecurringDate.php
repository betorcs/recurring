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