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