<?php

use BeetechAsia\GoShip\Enums\Kind;
use BeetechAsia\GoShip\Facades\GoShip;
use Illuminate\Http\Client\ConnectionException;
use Random\RandomException;

it(
    'getRates must be array',
    /**
     * @throws ConnectionException
     * @throws RandomException
     */
    function () {
        $rates = GoShip::getRates([
            'shipment' => [
                'address_from' => [
                    'district' => 100100,
                    'city' => 100000,
                ],
                'address_to' => [
                    'district' => 100100,
                    'city' => 100000,
                ],
                'parcel' => [
                    'cod' => fake()->boolean() ? random_int(100_000, 200_000) : null,
                    'amount' => fake()->boolean() ? random_int(100_000, 200_000) : null,
                    'width' => random_int(10, 100),
                    'height' => random_int(10, 100),
                    'length' => random_int(10, 100),
                    'weight' => random_int(10, 100),
                ],
            ],
        ]);

        expect($rates)
            ->dump()
            ->toBeArray();
    }
);

it(
    'getOnDemandRates must be array',
    /**
     * @throws ConnectionException
     * @throws RandomException
     */
    function () {
        $rates = GoShip::getOnDemandRates([
            'paths' => [
                [
                    'lat' => fake()->latitude(),
                    'lng' => fake()->longitude(),
                    'kind' => Kind::PICKUP,
                ],
                [
                    'lat' => fake()->latitude(),
                    'lng' => fake()->longitude(),
                    'kind' => Kind::DELIVERY,
                    'parcel' => [
                        'cod_amount' => fake()->boolean() ? random_int(100_000, 200_000) : null,
                        'amount' => fake()->boolean() ? random_int(100_000, 200_000) : null,
                        'name' => fake()->name(),
                        'quantity' => random_int(10, 100),
                        'width' => random_int(10, 100),
                        'weight' => random_int(10, 100),
                        'height' => random_int(10, 100),
                    ],
                ],
            ],
        ]);

        expect($rates)
            ->dump()
            ->toBeArray();
    }
);
