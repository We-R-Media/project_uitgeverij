<?php

namespace App\AppHelpers;

use DateTime;

class DateHelper {
    public function formatReadableDate($date) {
        setlocale(LC_TIME, 'nl_NL');

        $dateTime = new DateTime( $date );
        $formattedDate = $dateTime->format('l j F Y H:i:s');

        echo $formattedDate;
    }
}
