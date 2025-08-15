<?php

use BeetechAsia\GoShip\Facades\GoShip;
use Illuminate\Http\Client\ConnectionException;
use Random\RandomException;

it(
    'getCustomers must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $customers = GoShip::getCustomers();

        expect($customers)
            ->dump()
            ->toBeArray();
    }
);

it(
    'searchCustomer must be array',
    /**
     * @throws ConnectionException
     * @throws RandomException
     */
    function () {
        $customers = GoShip::searchCustomer(match (random_int(0, 2)) {
            0 => fake()->name(),
            1 => fake()->freeEmail(),
            2 => fake()->phoneNumber(),
        });

        expect($customers)
            ->dump()
            ->toBeArray();
    }
);

it(
    'createCustomer must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $customer = GoShip::createCustomer([
            'name' => fake()->name(),
            'email' => fake()->freeEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => [
                'street' => fake()->streetAddress(),
                'district' => 100100,
                'city' => 100000,
            ],
        ]);

        expect($customer)
            ->dump()
            ->toBeArray();
    }
);

it(
    'updateCustomer must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $customer = GoShip::updateCustomer('z82pdr26', [
            'name' => fake()->name(),
            'email' => fake()->freeEmail(),
            'phone' => fake()->phoneNumber(),
        ]);

        expect($customer)
            ->dump()
            ->toBeArray();
    }
);

it(
    'deleteCustomer must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $customer = GoShip::deleteCustomer('z82pdr26');

        expect($customer)
            ->dump()
            ->toBeString();
    }
);
