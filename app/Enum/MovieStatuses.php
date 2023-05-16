<?php

namespace App\Enum;

use ArchTech\Enums\Values;

enum MovieStatuses: string
{
    use Values;
    case PRODUCTION = 'PRODUCTION';

    case PRE_RELEASE = 'PRE_RELEASE';

    case RELEASED = 'RELEASED';
}
