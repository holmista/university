<?php

namespace App\Enums;

use App\Traits\EnumUtils;
use App\Traits\EnumUtilss;

enum ImagableTypeEnum: string
{
    use EnumUtils;

    case Restaurant = 'Restaurant';
    case User = 'User';
    case Dishes = 'Dishes';
}
