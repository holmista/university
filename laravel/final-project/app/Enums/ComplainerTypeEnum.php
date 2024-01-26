<?php

namespace App\Enums;

use App\Models\Courier;
use App\Models\Restaurant;
use App\Models\User;
use App\Traits\EnumUtils;

enum ComplainerTypeEnum: string
{
    use EnumUtils;

    case Restaurant = Restaurant::class;
    case User = User::class;
    case Courier = Courier::class;
}
