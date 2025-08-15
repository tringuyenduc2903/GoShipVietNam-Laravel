<?php

use BeetechAsia\GoShip\Facades\GoShip;
use Illuminate\Http\Client\ConnectionException;

it(
    'getTransactions must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $transactions = GoShip::getTransactions();

        expect($transactions)
            ->dump()
            ->toBeArray();
    }
);
