<?php

namespace App\AppHelpers;

class MoneyHelper {
    public static function convertToNumeric($value) {
        if (empty($value)) {
            return null;
        }

        $converted_value = str_replace(['€', '.', ','], ['', '', '.'], $value);

        return $converted_value;
    }

    public static function taxCalculation($value, $tax) {
        $numericValue = self::convertToNumeric($value);
    
        if ($numericValue === null) {
            return null;
        }
    
        $valueWithTax = $numericValue + ($numericValue * ($tax / 100));
    
        return $valueWithTax;
    }
    }