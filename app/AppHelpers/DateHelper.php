<?php

namespace App\AppHelpers;

use DateTime;

class DateHelper {
    public static function formatReadableDate($date) {
        setlocale(LC_TIME, 'nl_NL');

        $dateTime = new DateTime( $date );
        $formattedDate = $dateTime->format('l j F Y H:i:s');
        // $formattedDate = $dateTime->format('d-m-Y');

        echo $formattedDate;
    }

    // public static function dateTimeBlade($display) {
    //     setLocale(LC_TIME, 'nl_NL');
    //     $dateTime = new DateTime($display);
    //     $displayedDate = $dateTime->format('d m Y');
    // }
}
