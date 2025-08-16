<?php

declare(strict_types=1);

namespace BeetechAsia\GoShip\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static NEW()
 * @method static static SENT()
 * @method static static WAITING_FOR_PICKUP()
 * @method static static PICKING_UP()
 * @method static static PICKED_UP()
 * @method static static DELIVERING()
 * @method static static DELIVERED_SUCCESS()
 * @method static static DELIVERED_FAILED()
 * @method static static RETURNING()
 * @method static static RETURNED()
 * @method static static COMPLETED()
 * @method static static CANCELED()
 * @method static static ERROR()
 */
final class OnDemandShipment extends Enum implements LocalizedEnum
{
    const int NEW = 900;

    const int SENT = 901;

    const int WAITING_FOR_PICKUP = 902;

    const int PICKING_UP = 903;

    const int PICKED_UP = 904;

    const int DELIVERING = 905;

    const int DELIVERED_SUCCESS = 906;

    const int DELIVERED_FAILED = 907;

    const int RETURNING = 908;

    const int RETURNED = 909;

    const int COMPLETED = 910;

    const int CANCELED = 911;

    const int ERROR = 1000;
}
