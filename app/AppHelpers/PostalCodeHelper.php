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
        $numbers = rand(1000, 9999); // Generates a random number between 1000 and 9999
        $letters = chr(rand(65, 90)) . chr(rand(65, 90)); // Generates two random uppercase letters

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
        if (strpos($postalCode, ' ') !== false) {
            // If a space is present, apply the formatting
            $numbers = substr($postalCode, 0, 4);
            $letters = substr($postalCode, 5, 2);
            return $numbers . ' ' . strtoupper($letters);
        }

        // If no space is present, return the original postal code
        return $postalCode;
    }
}