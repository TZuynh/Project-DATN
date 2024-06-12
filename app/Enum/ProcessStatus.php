<?php

namespace App\Enum;

use App\Traits\EnumOptions;
use App\Traits\EnumValues;

enum ProcessStatus: int
{
    use EnumValues, EnumOptions;

    case CANCELLED = 2;
    case DONE = 1;
    case PENDING = 0;
}
