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
            ? GoShip::searchTransaction(fake()->randomElement(['GS8KOV152L', '96f794ff-261d-4ee3-98e0-c04cf1063549']))
            : GoShip::searchTransaction(
                from: now()->subDays(7)->format('Y-m-d'),
                to: now()->format('Y-m-d')
            );

        expect($transactions)
            ->dump()
            ->toBeArray();
    }
);
