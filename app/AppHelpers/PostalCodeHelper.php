<?php

namespace App\AppHelpers;

class PostalCodeHelper {
    /**
     * Generate a Dutch postal code.
     *
     * @return string
     */
    public static function generatePostalCode()
    {
        $numbers = rand(1000, 9999);
        $letters = chr(rand(65, 90)) . chr(rand(65, 90));

        return $numbers . ' ' . $letters;
    }

    /**
     * Format a Dutch postal code.
     *
     * This method takes a Dutch postal code and returns it formatted if a space is present.
     *
     * @param string $postalCode The Dutch postal code to format.
     * @return string The formatted or unformatted Dutch postal code.
     */
    public static function formatPostalCode($postalCode)
    {
        if (strpos($postalCode, ' ') == false) {
            $numbers = substr($postalCode, 0, 4);
            $letters = substr($postalCode, 4, 2);
            return $numbers . ' ' . strtoupper($letters);
        }

        return $postalCode;
    }
}