<?php

namespace App\Enum;

use App\Traits\EnumOptions;
use App\Traits\EnumValues;

enum BadgeColor: int
{
    use EnumValues, EnumOptions;

    case PRIMARY = 1;
    case INFO = 2;
    case SUCCESS = 3;
    case SECONDARY = 4;
    case WARNING = 5;
    case DANGER = 6;
    case DARK = 7;
}
