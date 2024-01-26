<?php

namespace App\Enums;

use App\Traits\EnumUtils;

enum OrderStatusEnum: string
{
    use EnumUtils;

    case Pending = 'Pending';
    case Accepted = 'Accepted';
    case Rejected = 'Rejected';
    case Cancelled = 'Cancelled';
    case CourierPickingUp = 'Courier_picking_up';
    case Delivering = 'Delivering';
    case Delivered = 'Delivered';
}
