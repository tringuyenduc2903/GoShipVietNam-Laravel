<?php

namespace BeetechAsia\GoShip\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \BeetechAsia\GoShip\GoShip
 */
class GoShip extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \BeetechAsia\GoShip\GoShip::class;
    }
}
