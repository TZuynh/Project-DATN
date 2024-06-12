<?php

namespace App\Traits;

trait EnumValues
{
    /**
     * List all values of the enum using this trait
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
