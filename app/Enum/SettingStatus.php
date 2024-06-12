<?php

namespace App\Enum;

use App\Traits\EnumOptions;
use App\Traits\EnumValues;

enum SettingStatus: int
{
    use EnumValues, EnumOptions;

    case ENABLED = 1;
    case DISABLED = 0;
}
