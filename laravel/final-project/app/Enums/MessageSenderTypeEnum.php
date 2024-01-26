<?php

namespace App\Enums;

use App\Models\Courier;
use App\Models\Restaurant;
use App\Models\User;
use App\Traits\EnumUtils;

enum MessageSenderTypeEnum: string
{
    use EnumUtils;

    case Customer = User::class;
    case Restaurant = Restaurant::class;
    case Courier = Courier::class;
}
