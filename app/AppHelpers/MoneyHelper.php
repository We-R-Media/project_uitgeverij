<?php

namespace App\AppHelpers;


class MoneyHelper {
    public static function convertToNumeric($value) {
    $converted_value = str_replace(['€','.',','], ['','','.'], $value);
   
    return $converted_value;
    }
}
