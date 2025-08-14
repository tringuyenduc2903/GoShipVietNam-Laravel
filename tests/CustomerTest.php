<?php

use BeetechAsia\GoShip\Facades\GoShip;
use Illuminate\Http\Client\ConnectionException;

it(
    'createCustomer must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $customer = GoShip::createCustomer([
            'name' => fake()->name(),
            'email' => fake()->email(),
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
