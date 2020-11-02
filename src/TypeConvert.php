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
}
