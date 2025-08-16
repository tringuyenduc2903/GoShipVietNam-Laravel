<?php

declare(strict_types=1);

namespace BeetechAsia\GoShip\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static PICKUP()
 * @method static static DELIVERY()
 */
final class Kind extends Enum
{
    const int PICKUP = 1;

    const int DELIVERY = 2;
}
