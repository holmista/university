<?php

namespace App\Enums;

use App\Traits\EnumUtils;

enum ConversationStatusEnum: string
{
    use EnumUtils;

    case Open = 'Open';
    case Closed = 'Closed';
}
