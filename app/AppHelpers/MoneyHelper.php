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
            $value_with_tax = $value * (1 + ($tax / 100));

            return $value_with_tax;
        }
    }