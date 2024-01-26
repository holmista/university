<?php

namespace App\Enums;

use App\Models\Complaint;
use App\Models\Conversation;
use App\Models\Courier;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;
use App\Traits\EnumUtils;

enum MessageReceiverTypeEnum: string
{
    use EnumUtils;

    case Order = User::class;
    case Restaurant = Restaurant::class;
    case Courier = Courier::class;
}
