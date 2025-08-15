<?php

declare(strict_types=1);

namespace BeetechAsia\GoShip\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static NEW()
 * @method static static WAITING_FOR_PICKUP()
 * @method static static PICKING_UP()
 * @method static static PICKED_UP()
 * @method static static DELIVERING()
 * @method static static DELIVERED_SUCCESS()
 * @method static static DELIVERED_FAILED()
 * @method static static RETURNING()
 * @method static static RETURNED()
 * @method static static RECONCILED()
 * @method static static RECONCILED_WITH_CUSTOMER()
 * @method static static COD_PAID_TO_CUSTOMER()
 * @method static static WAITING_FOR_COD_PAYMENT()
 * @method static static COMPLETED()
 * @method static static CANCELED()
 * @method static static DELAYED_PICKUP_DELIVERY()
 * @method static static PARTIAL_DELIVERY()
 * @method static static LOST()
 * @method static static IN_STORAGE()
 * @method static static IN_TRANSIT()
 * @method static static ERROR()
 */
final class Shipment extends Enum implements LocalizedEnum
{
    const int NEW = 900;

    const int WAITING_FOR_PICKUP = 901;

    const int PICKING_UP = 902;

    const int PICKED_UP = 903;

    const int DELIVERING = 904;

    const int DELIVERED_SUCCESS = 905;

    const int DELIVERED_FAILED = 906;

    const int RETURNING = 907;

    const int RETURNED = 908;

    const int RECONCILED = 909;

    const int RECONCILED_WITH_CUSTOMER = 910;

    const int COD_PAID_TO_CUSTOMER = 911;

    const int WAITING_FOR_COD_PAYMENT = 912;

    const int COMPLETED = 913;

    const int CANCELED = 914;

    const int DELAYED_PICKUP_DELIVERY = 915;

    const int PARTIAL_DELIVERY = 916;

    const int LOST = 917;

    const int IN_STORAGE = 918;

    const int IN_TRANSIT = 919;

    const int ERROR = 1000;
}
