<?php

declare(strict_types=1);

namespace BeetechAsia\GoShip\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static CUSTOMER()
 * @method static static SHOP()
 */
final class Payer extends Enum
{
    const int CUSTOMER = 0;

    const int SHOP = 1;
}
