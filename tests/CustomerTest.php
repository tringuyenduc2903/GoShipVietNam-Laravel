<?php

use BeetechAsia\GoShip\Facades\GoShip;
use Illuminate\Http\Client\ConnectionException;

it(
    'getCustomers must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $customers = GoShip::getCustomers();

        expect($customers)->toBeArray();
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

        expect($customer)->toBeArray();
    }
);

it(
    'updateCustomer must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $customer = GoShip::updateCustomer('3lm5kg26', [
            'name' => fake()->name(),
            'email' => fake()->freeEmail(),
            'phone' => fake()->phoneNumber(),
        ]);

        expect($customer)->toBeArray();
    }
);

it(
    'deleteCustomer must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $customer = GoShip::deleteCustomer('3lm5kg26');

        expect($customer)->toBeArray();
    }
);
