<?php

use BeetechAsia\GoShip\Facades\GoShip;
use Illuminate\Http\Client\ConnectionException;

it(
    'getInvoices must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $invoices = GoShip::getInvoices();

        expect($invoices)
            ->dump()
            ->toBeArray();
    }
);

it(
    'searchInvoice must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $invoices = fake()->boolean()
            ? GoShip::searchInvoice('FA13HEUD')
            : GoShip::searchInvoice(
                from: now()->subDays(7)->format('Y-m-d'),
                to: now()->format('Y-m-d')
            );

        expect($invoices)
            ->dump()
            ->toBeArray();
    }
);
