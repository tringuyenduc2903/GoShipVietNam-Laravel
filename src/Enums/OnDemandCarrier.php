<?php

declare(strict_types=1);

namespace BeetechAsia\GoShip\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static AHAMOVE()
 * @method static static GRAB()
 */
final class OnDemandCarrier extends Enum
{
    const int AHAMOVE = 1;

    const int GRAB = 2;
}
