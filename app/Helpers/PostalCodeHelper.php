<?php
namespace App\Helpers;

class Helpers {

    /**
     * Generate a Dutch postal code.
     *
     * @return string
     */
    public static function generatePostalCode()
    {
        return fake()->randomNumber(4) . ' ' . strtoupper( fake()->randomLetter() ) . strtoupper( fake()->randomLetter() );
    }

    /**
     * Format a Dutch postal code.
     *
     * This method takes a Dutch postal code in the format "1234AB" and
     * returns it formatted as "1234 AB".
     *
     * @param string $postalCode The Dutch postal code to format.
     * @return string The formatted Dutch postal code.
     */
    public static function formatPostalCode($postalCode)
    {
        $numbers = substr($postalCode, 0, 4);
        $letters = substr($postalCode, 4, 2);

        return $numbers . ' ' . strtoupper($letters);
    }
}
