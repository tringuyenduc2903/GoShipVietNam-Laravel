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
