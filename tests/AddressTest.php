<?php

use BeetechAsia\GoShip\Facades\GoShip;

it('getProvinces must be array', function () {
    $provinces = GoShip::getProvinces();

    expect($provinces)->toBeArray();
});
