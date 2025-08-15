<?php

declare(strict_types=1);

namespace BeetechAsia\GoShip\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static VTPOST()
 * @method static static EMS()
 * @method static static VNPOST()
 * @method static static GHTK()
 * @method static static GHNV3()
 * @method static static SPX()
 * @method static static BEST()
 * @method static static TIKINOW()
 */
final class Carrier extends Enum
{
    const string VTPOST = 'vtp';

    const string EMS = 'ems';

    const string VNPOST = 'vnp';

    const string GHTK = 'ghtk';

    const string GHNV3 = 'ghnv3';

    const string SPX = 'shopee';

    const string BEST = 'best';

    const string TIKINOW = 'tikinow';
}
