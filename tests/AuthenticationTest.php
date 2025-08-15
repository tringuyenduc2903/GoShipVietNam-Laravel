<?php

use BeetechAsia\GoShip\Facades\GoShip;
use Illuminate\Http\Client\ConnectionException;

it(
    'login must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $result = GoShip::login([
            'username' => config('goshipvietnam.username'),
            'password' => config('goshipvietnam.password'),
            'client_id' => config('goshipvietnam.client_id'),
            'client_secret' => config('goshipvietnam.client_secret'),
        ]);

        expect($result)->toBeArray();
    }
);
