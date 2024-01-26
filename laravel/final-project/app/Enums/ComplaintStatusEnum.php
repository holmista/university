<?php

namespace App\Enums;

use App\Traits\EnumUtils;

enum ComplaintStatusEnum: string
{
    use EnumUtils;

    case Pending = 'Pending';
    case Received = 'Received';
    case Rejected = 'Rejected';
    case Accepted = 'Accepted';
    case Investigating = 'Investigating';
    case Resolved = 'Resolved';
}
