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
            ? GoShip::searchInvoice('HDF9D9SS')
            : GoShip::searchInvoice(
                from: now()->subDays(7)->format('Y-m-d'),
                to: now()->format('Y-m-d')
            );

        expect($invoices)
            ->dump()
            ->toBeArray();
    }
);

it(
    'getShipmentByInvoiceId must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $shipments = GoShip::getShipmentByInvoiceId('HDF9D9SS');

        expect($shipments)
            ->dump()
            ->toBeArray();
    }
);
