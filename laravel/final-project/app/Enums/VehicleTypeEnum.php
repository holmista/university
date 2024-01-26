<?php

namespace App\Enums;

use App\Traits\EnumUtils;

enum VehicleTypeEnum: string
{
    use EnumUtils;

    case Bicycle = 'Bicycle';
    case Motorcycle = 'Motorcycle';
    case Car = 'Car';
    case Foot = 'Foot';
}
