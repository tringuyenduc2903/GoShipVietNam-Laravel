<?php

use BeetechAsia\GoShip\Facades\GoShip;
use Illuminate\Http\Client\ConnectionException;

it(
    'getDistricts must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $districts = GoShip::getDistricts();

        expect($districts)
            ->dump()
            ->toBeArray();
    }
);

it(
    'getWardsByDistrictId must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $wards = GoShip::getWardsByDistrictId(100100);

        expect($wards)
            ->dump()
            ->toBeArray();
    }
);
