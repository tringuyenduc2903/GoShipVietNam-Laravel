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

it(
    'searchTransaction must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $transactions = fake()->boolean()
            ? GoShip::searchTransaction('GSox6or6q5')
            : GoShip::searchTransaction(
                from: now()->subDays(7)->format('Y-m-d'),
                to: now()->format('Y-m-d')
            );

        expect($transactions)
            ->dump()
            ->toBeArray();
    }
);
