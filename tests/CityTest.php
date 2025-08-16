<?php

use BeetechAsia\GoShip\Facades\GoShip;
use Illuminate\Http\Client\ConnectionException;

it(
    'getCities must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $cities = GoShip::getCities();

        expect($cities)
            ->dump()
            ->toBeArray();
    }
);

it(
    'getDistrictsByCityId must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $districts = GoShip::getDistrictsByCityId(100000);

        expect($districts)
            ->dump()
            ->toBeArray();
    }
);
