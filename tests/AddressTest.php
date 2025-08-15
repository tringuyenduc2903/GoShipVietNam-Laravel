<?php

use BeetechAsia\GoShip\Facades\GoShip;
use Illuminate\Http\Client\ConnectionException;

it(
    'getProvinces must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $provinces = GoShip::getProvinces();

        expect($provinces)
            ->dump()
            ->toBeArray();
    }
);

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
    'getDistrictsByProvinceId must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $districts = GoShip::getDistrictsByProvinceId(100000);

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
        $wards = GoShip::getWardsByDistrictId(100300);

        expect($wards)
            ->dump()
            ->toBeArray();
    }
);
