<?php

namespace App\AppHelpers;

class MoneyHelper {
    public static function convertToNumeric($value) {
        // Check if the value is empty
        if (empty($value)) {
            return null; // or 0, depending on your requirements
        }

        // Replace symbols and format the value
        $converted_value = str_replace(['€', '.', ','], ['', '', '.'], $value);

        return $converted_value;
    }
}