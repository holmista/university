<?php

namespace App\Enums;

use App\Models\Courier;
use App\Models\Restaurant;
use App\Models\User;
use App\Traits\EnumUtils;

enum ComplaineeTypeEnum: string
{
    use EnumUtils;

    case Restaurant = Restaurant::class;
    case User = User::class;
    case Courier = Courier::class;
}

