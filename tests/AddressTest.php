<?php

use BeetechAsia\GoShip\Facades\GoShip;

it('getProvinces must be array', function () {
    $provinces = GoShip::getProvinces();

    expect($provinces)->toBeArray();
});

it('getDistrictsByProvinceId must be array', function () {
    $districts = GoShip::getDistrictsByProvinceId(100000);

    expect($districts)->toBeArray();
});

it('getDistricts must be array', function () {
    $districts = GoShip::getDistricts();

    expect($districts)->toBeArray();
});

it('getWardsByDistrictId must be array', function () {
    $wards = GoShip::getWardsByDistrictId(100300);

    expect($wards)->toBeArray();
});
