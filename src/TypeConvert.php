<?php
namespace Grohiro\Sanitizer;

use Illuminate\Support\Carbon;

/**
 * Convert type
 */
class TypeConvert
{
    /**
     * Convert string value to Carbon (DateTime)
     */
    public function date($string)
    {
        return Carbon::parse($string);
    }

    /**
     * Convert string boolean
     */
    public function boolean($string)
    {
        $falseValue = [
            'f',
            'false',
            'no',
            'null',
        ];

        if (in_array(strtolower($string), $falseValue)) {
            return false;
        }

        return (boolean)$string;
    }
}
